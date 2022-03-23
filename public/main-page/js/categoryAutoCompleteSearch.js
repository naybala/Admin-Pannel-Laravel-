const autoCompleteInputTag = document.querySelector(".autoCompleteInput", [0]);
const resultContainerTag = document.querySelector(".resultContainer", [0]);
const result = document.querySelector(".result", [0]);
const btnSubmit = document.querySelector(".btnSubmit", [0]);
var apiCall = async () => {
    const response = await fetch("http://127.0.0.1:8000/api/categrory/list",
        {
            method: "GET",
            headers: {
                "Content-Type": 'application/json'
            }
        });
    const jsonResponse = await response.json();
    let filteredProducts = [];

    autoCompleteInputTag.addEventListener("keyup", (e) => {
        resultContainerTag.innerHTML = "";
        const searchText = e.target.value.toLowerCase();
        if (searchText.length === 0) {
            return false;
        }
        filteredProducts = jsonResponse.filter((product) => {
            return product.category_name.toLowerCase().includes(searchText);
        });

        if (filteredProducts.length > 0) {
            for (let i = 0; i < filteredProducts.length; i++) {
                const productItemContainer = document.createElement("div");
                productItemContainer.id = filteredProducts[i].category_id;
                productItemContainer.classList.add("productItemContainer");

                const productId = document.createElement("div");
                productId.classList.add("productId");
                productId.append(filteredProducts[i].category_id);

                const productName = document.createElement("div");
                productName.classList.add("productName");
                productName.append(filteredProducts[i].category_name);


                productItemContainer.append(productId, productName);
                resultContainerTag.append(productItemContainer);
                //Adding Mouse Event With Cursor And Click
                productItemContainer.addEventListener("mouseenter", (e) => {
                    e.target.style.backgroundColor = "#237BFF";
                    e.target.style.borderRadius = "1rem";
                    e.target.style.cursor = "pointer";
                    e.target.firstChild.style.color = "white";
                    e.target.childNodes[1].style.color = "white";
                });
                productItemContainer.addEventListener("mouseleave", (e) => {
                    e.target.style.backgroundColor = "white";
                    e.target.firstChild.style.color = "black";
                    e.target.childNodes[1].style.color = "black";
                });
                productItemContainer.addEventListener("click", () => {
                    result.value = filteredProducts[i].category_name;
                    btnSubmit.click();
                });
                //Adding Mouse Event With Cursor And Click End

            }
        }


    });

}

apiCall();




