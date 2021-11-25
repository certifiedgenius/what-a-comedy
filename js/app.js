let photoContainer = document.querySelector("#photo-page-container");

fetch("/data/images.json")
    .then((response) => response.json())
    .then((photoData) => {
        photoData.forEach((image) => {
            let img = document.createElement("img");
            let pTagg = document.createElement("p");
            let pTaggAlt = document.createElement("p");

            img.src = image.url;
            img.alt = image.alt;
            img.description = image.description;
            img.dataset.description = image.description;
            pTagg.innerHTML = image.title;
            pTaggAlt.innerHTML = image.alt;
            img.classList = "targetImage";

            photoContainer.appendChild(img);
            photoContainer.appendChild(pTagg);
            photoContainer.appendChild(pTaggAlt);
        });
    });


document.addEventListener("click", function (event) {
    if (event.target.classList.contains("targetImage")) {
        let source = event.target.getAttribute("src");
        let modalPopup = document.querySelector("#modal-popup");
        modalPopup.style.display = "block";
        console.log(source);
        document.querySelector("#image-popup").src = source;
        let select = document.getElementById("description");
        let getData = event.target.dataset.description;
        select.innerText = getData;


    }
});

btn.onclick = function () {
    modalPopup.style.display = "none";
};