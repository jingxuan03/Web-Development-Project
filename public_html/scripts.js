let movies = {
    data:[
        {
        movieName: "John Wick 4",
        genretype: "Action",
        image: "img/johnwick.png",
        }, 
        {
        movieName: "Suzume",
        genretype: "Anime",
        image: "img/suzume.png",
        },
        {
        movieName: "Ant-Man and the Wasp: Quantumania",
        genretype: "Action",
        image: "img/antman.png",
        },
        {
        movieName: "Jung_E",
        genretype: "Sci-fi",
        image: "img/junge.png",
        },
        {
        movieName: "Murder Mystery 2",
        genretype: "Mystery",
        image: "img/mm2.png",
        },
        {
        movieName: "Tetris",
        genretype: "Biography",
        image: "img/tetris.png",
        },
    ],
};

for (let i = 0; i < movies.data.length; i++) {
    let movie = movies.data[i];
    let card = document.createElement("div");
    card.classList.add("card", movie.genretype.toLowerCase());

    let anchor = document.createElement("a");
    anchor.setAttribute("href", getMoviePageFileName(i));

    let imgContainer = document.createElement("div");
    imgContainer.classList.add("image-container");

    let image = document.createElement("img");
    image.setAttribute("src", movie.image);
    imgContainer.appendChild(image);
    anchor.appendChild(imgContainer);

    let container = document.createElement("div");
    container.classList.add("container");

    let movieName = document.createElement("h5");
    movieName.classList.add("movie-name");
    movieName.innerText = movie.movieName.toUpperCase();
    container.appendChild(movieName);

    let genretype = document.createElement("h6");
    genretype.innerText = movie.genretype;
    container.appendChild(genretype);

    card.appendChild(anchor);
    card.appendChild(container);
    document.getElementById("movies").appendChild(card);
}

function getMoviePageFileName(index) {
    switch (index) {
        case 0:
            return "moviepage.html";
        case 1:
            return "moviepage2.html";
        case 2:
            return "moviepage3.html";
        case 3:
            return "moviepage4.html";
        case 4:
            return "moviepage5.html";
        case 5:
            return "moviepage6.html";
        default:
            return "#";
    }
}

function filterMovies(value) {
    let buttons = document.querySelectorAll(".button-value");
    buttons.forEach((button) => {
      if (value.toUpperCase() === button.innerText.toUpperCase()) {
        button.classList.add("active");
      } else {
        button.classList.remove("active");
      }
    });

    let elements = document.querySelectorAll(".card");
    elements.forEach((element) => {
        if (value == "all" || element.classList.contains(value.toLowerCase())) {
            element.classList.remove("hide");
        }
        else{
            if(element.classList.contains(value)) {
                element.classList.remove("hide");
            }else{
                element.classList.add("hide");
            }
        }
    });
}

document.getElementById("search").addEventListener
("click", () => {
    let searchInput = document.getElementById("search-input").value;
    let elements = document.querySelectorAll(".movie-name");
    let cards = document.querySelectorAll(".card");

    elements.forEach((element, index) => {
        if (element.innerText.includes(searchInput.toUpperCase())) {
            cards[index].classList.remove("hide");
        }else{
            cards[index].classList.add("hide");
        }
    })
});

window.onload = () => {
    filterMovies("all");
};