
const round = document.getElementsByClassName('round')
const elt_general = document.getElementsByTagName('body')[0]


console.log()
let i=0;
for (const element of round) {
    i++;
    setTimeout((element) => {
        element.style.display = "flex";
        //scrollTo(0, elt_general.offsetHeight);
    }, i*800, element);



}
