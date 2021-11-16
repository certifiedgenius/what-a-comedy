// fetching data from the images.json file
fetch('/data/images.json')
    .then(response => response.json())
    .then(data => {
        console.log(data);
    });



// Data Containers
let galleryImages = document.querySelectorAll(".gallery-img");
let getLatestOpenedImg;
let windowWidth = window.innerWidth;

// Description 
let imgCaption = document.querySelectorAll(".description");


// if statement for the Images
if (galleryImages) {
    galleryImages.forEach(function (image, index) { 
        image.onclick = function () { // Onclick all the code below will be ran
            let getElementCss = window.getComputedStyle(image); // Get all the CSS style with getComputedStyle
            let getFullImgUrl = getElementCss.getPropertyValue("background-image"); // Get the specific background image url
            let getImgUrlPos = getFullImgUrl.split("/img/thumbs/"); // Remove the unnecessery url text at the end, and only grab /img/thumbs/ 
            let setNewImgUrl = getImgUrlPos[1].replace('")', ''); // Creates a new url by refrensing to the second index by [1].replace and replaceing to "")

            getLatestOpenedImg = index + 1; // index counts all the posintion of the array with index, made it easy to read by doing + 1 so it dose not count the js engine way [0] [1] 


            // The popup (My canvas where my photo is attached to)
            let container = document.body; // The popup window on body of our page
            let newImgWindow = document.createElement("div"); // Creating a div inside the popup window
            container.appendChild(newImgWindow); // Applying (a.k.a the "div") the element to our body of the website
            newImgWindow.setAttribute("class", "img-window"); // Creating a class and calling it "img-window"
            newImgWindow.setAttribute("onclick", "closeImg()"); // Creating a onclick event, which is going to run a function which is below called "closeImg" when we click on the div inside the popup we created


            // The photo (inside my canvas frame)
            let newImg = document.createElement("img"); // Creating a img element a.k.a a div for the image
            newImgWindow.appendChild(newImg); // Refrensing "newImgWindow" to show where I want to hang my photo, by doing (newImg) I tell it to insert the newImg inside the Canvas
            newImg.setAttribute("src", "img/" + setNewImgUrl); // Linking to the diffrent images using src and "img/" inside this folder is where my images are + set new image url
            newImg.setAttribute("id", "current-img"); // 


            //Previous, Next, and Close Button 
            newImg.onload = function () { // Run this block of code when the image is done loading
                let imgWidth = this.width; // this object a.k.a newImg, .width to get the width of an object, in this case 
                let calcImgToEdge = ((windowWidth - imgWidth) / 2) - 80;


                // Next Button
                let newNextBtn = document.createElement("a"); // Creating a new prev button, creating an "a" tag
                let btnNextText = document.createTextNode("Next"); // Creating textnode, text to go inside the "a" tag, and the text is Next
                newNextBtn.appendChild(btnNextText); // Appending Next button to the text node
                container.appendChild(newNextBtn); // Appending the "a" the Website (document.body)


                // Next button attribute (fifa stats sniper)
                newNextBtn.setAttribute("class", "img-btn-next"); // Creating a class, called "img-btn-next"
                newNextBtn.setAttribute("onclick", "changeImg(1)"); // Creating a onclick event, that is called "changeImg(1)" so it goes forward
                newNextBtn.style.cssText = "right: " + calcImgToEdge + "px;";


                // Prev Button
                let newPrevBtn = document.createElement("a"); // Creating a new prev button, creating an "a" tag
                let btnPrevText = document.createTextNode("Prev"); // Creating textnode, text to go inside the "a" tag, and the text is Prev
                newPrevBtn.appendChild(btnPrevText); // Appending Prev button to the text node
                container.appendChild(newPrevBtn); // Appending the "a" the Website (document.body)


                // Prev button attribute (fifa stats wall)
                newPrevBtn.setAttribute("class", "img-btn-prev"); // Creating a class, called "img-btn-prev"
                newPrevBtn.setAttribute("onclick", "changeImg(0)"); // Creating a onclick event, that is called "changeImg(0)" so it goes backwards
                newPrevBtn.style.cssText = "left: " + calcImgToEdge + "px;";
            }

        }
    });
}


// Popup Image function that removes Popup Window, Prev, Next and Close 
function closeImg() {
    document.querySelector(".img-window").remove(); // Removes the POPUP window
    document.querySelector(".img-btn-next").remove(); // Removes the NEXT button
    document.querySelector(".img-btn-prev").remove(); // Removes the PREV button

    
}


// Popup Window Image Direction Function
function changeImg(changeDir) {
    document.querySelector("#current-img").remove();

    let getImgWindow = document.querySelector(".img-window");
    let newImg = document.createElement("img");
    getImgWindow.appendChild(newImg);

    let calcNewImg;
    if (changeDir === 1) {
        calcNewImg = getLatestOpenedImg + 1;
        if (calcNewImg > galleryImages.length) {
            calcNewImg = 1;
        }
    } else if (changeDir === 0) {
        calcNewImg = getLatestOpenedImg - 1;
        if (calcNewImg < 1) {
            calcNewImg = galleryImages.length;
        }
    }

    newImg.setAttribute("src", "img/img-" + calcNewImg + ".jpg");
    newImg.setAttribute("id", "current-img");

    getLatestOpenedImg = calcNewImg;


    newImg.onload = function () {
        let imgWidth = this.width;
        let calcImgToEdge = ((windowWidth - imgWidth) / 2) - 80;

        let nextBtn = document.querySelector(".img-btn-next");
        nextBtn.style.cssText = "right: " + calcImgToEdge + "px;";

        let prevBtn = document.querySelector(".img-btn-next");
        prevBtn.style.cssText = "right: " + calcImgToEdge + "px;";
    }
}