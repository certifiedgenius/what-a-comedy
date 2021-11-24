let photoContainer = document.querrySelector("#photo-page-container");



fetch("/data/images.json")
    .then((response) => response.json())
    .then((photoData) => {
        photoData.forEach((image) => {
            let img = document.createElement("img");
        })
    })