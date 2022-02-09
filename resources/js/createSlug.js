const tittle = document.querySelector("#tittle");
const slug = document.querySelector("#slug");

// membuat event handler ketika di tab
tittle.addEventListener("change", function () {
    // melakukan fetch
    // memiliki paramenter url
    // tittle merupakan input
    // slug merupakan output
    fetch("/dashboard/posts/checkSlug?tittle=" + tittle.value)
        .then((response) => response.json())
        // slug merupakan form nya
        // value merupakan isinya
        // valuenya akan mengambil data dari slugnya
        .then((data) => (slug.value = data.slug));
});
