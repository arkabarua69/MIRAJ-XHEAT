const DB_NAME = "mx_visit_db";
const STORE_NAME = "visits";
const today = new Date().toISOString().split("T")[0];

function openDB() {
    return new Promise((resolve, reject) => {
        const request = indexedDB.open(DB_NAME, 1);

        request.onupgradeneeded = function (e) {
            const db = e.target.result;
            if (!db.objectStoreNames.contains(STORE_NAME)) {
                db.createObjectStore(STORE_NAME, { keyPath: "date" });
            }
        };

        request.onsuccess = () => resolve(request.result);
        request.onerror = () => reject("Failed to open DB");
    });
}

async function registerVisit() {
    const db = await openDB();
    const tx = db.transaction(STORE_NAME, "readwrite");
    const store = tx.objectStore(STORE_NAME);

    const todayReq = store.get(today);

    todayReq.onsuccess = function () {
        let todayCount = 1;

        if (todayReq.result) {
            todayCount = todayReq.result.count + 1;
            store.put({ date: today, count: todayCount });
        } else {
            store.add({ date: today, count: 1 });
        }

        const allReq = store.getAll();
        allReq.onsuccess = function () {
            let total = 0;
            allReq.result.forEach(r => total += r.count);

            document.getElementById("todayCount").textContent = todayCount;
            document.getElementById("totalCount").textContent = total;
        };
    };
}

registerVisit();
