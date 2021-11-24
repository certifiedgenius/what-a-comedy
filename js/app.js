let photoContainer = document.querrySelector("#photo-page-container");



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
        })
    })