console.log("dashbord.js loaded");

let editBtns = document.querySelectorAll(".edit-btn");
editBtns.forEach((editBtn) => {
    editBtn.addEventListener("click", (e) => {
        console.log(e.target.id);
        let m = e.target.id;
        getSingleData(e.target.id);
        document.querySelector(".id-update").value = m;
    });
});

function getSingleData(id) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/update-modal/" + id, true);
    xhr.send();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(xhr.responseText);
            // Populate the modal with data
            // console.log(data);
            document.getElementById("title_edit").value = data.title;
            document.getElementById("description_edit").value =
                data.description;
        }
    };
}
