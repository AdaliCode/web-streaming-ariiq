const kdrama = document.querySelector("#korean-drama-cover"); // tetep
const kdramahoverImage = kdrama.querySelectorAll("img"); // tetep
const kdramaPlaySymbol = kdrama.querySelectorAll("i"); // tetep
// console.table(kdramahoverImage);
for (let index = 0; index < kdramahoverImage.length; index++) {
  kdramahoverImage[index].addEventListener("mouseenter", function () {
    kdramaPlaySymbol[index].removeAttribute("hidden");
  });
  kdramahoverImage[index].addEventListener("mouseleave", function () {
    kdramaPlaySymbol[index].setAttribute("hidden", null);
  });
}
