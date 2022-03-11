let count = 1;
const value = document.querySelector("#value");
const value1 = document.querySelector("#value1");
const total = document.querySelector("#allTotal");
const finalTotal = document.querySelector("#finalTotal");
const btns = document.querySelectorAll(".btnCon");
console.log(value1);
finalTotal.textContent = total.textContent * count;
btns.forEach(function (btn) {
    btn.addEventListener("click", function (e) {
        const styles = e.currentTarget.classList;
        if (styles.contains("decrease")) {
            if (count === 1) {
                console.log("hello");
            } else {
                count--;
            }
        } else if (styles.contains("increase")) {
            count++;
        }
        value.textContent = count;
        value1.value = count;
        const totalValue = total.textContent * count;
        finalTotal.textContent = totalValue;
    });
});
