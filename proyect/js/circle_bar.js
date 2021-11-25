let num = document.getElementById("number");
let counter = 0;

setInterval(() => {
        if (counter == 50) {
            clearInterval();
        } else {
            counter++;
            num.innerHTML = counter + "%" + " financiado";
        }
    },
    40);