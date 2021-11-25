let photoContainer = document.querySelector("#photo-page-container");

fetch("/data/images.json")
    .then((response) => response.json())
    .then((photoData) => {
        photoData.forEach((image) => {
            let img = document.createElement("img");
            let pTag = document.createElement("p");
            let pTagCaptionOnPage = document.createElement("p");

            img.src = image.url;
            img.alt = image.alt;
            img.description = image.description;
            img.dataset.description = image.description;
            pTag.innerHTML = image.title;
            pTagCaptionOnPage.innerHTML = image.description;
            img.classList = "targetImage";

            photoContainer.appendChild(img);
            photoContainer.appendChild(pTag);
            photoContainer.appendChild(pTagCaptionOnPage);
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


