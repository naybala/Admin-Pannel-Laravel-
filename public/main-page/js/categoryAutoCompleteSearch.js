const autoCompleteInputTag = document.querySelector(".autoCompleteInput", [0]);
const resultContainerTag = document.querySelector(".resultContainer", [0]);
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
        // console.log(e.key);
        if (
            e.key === "ArrowDown" ||
            e.key === "ArrowUp" ||
            e.key === "Enter" ||
            e.key === "Backspace" ||
            e.key === "Delete" ||
            e.key === " "
        ) {
            navigateAndSelectProduct(e.key);
            return;
        }
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
            }
        }


    });

    let indexToSelect = -1;
    const navigateAndSelectProduct = (key) => {
        if (key === "ArrowDown") {
            if (indexToSelect === filteredProducts.length) {
                indexToSelect = 0;
            }
            if (indexToSelect === filteredProducts.length - 1) {
                indexToSelect = -1;
                deselectProduct();
                return;
            }
            indexToSelect += 1;
            const productItemContainerToSelect = selectProduct(indexToSelect);
            if (indexToSelect > 0) {
                deselectProduct();
            }
            productItemContainerToSelect.classList.add("selected");
        } else if (key === "ArrowUp") {
            if (indexToSelect === -1) {
                return;
            }

            if (indexToSelect === 0) {
                indexToSelect = filteredProducts.length;
                return;
            }
            indexToSelect -= 1;
            deselectProduct();
            const productItemContainerToSelect = selectProduct(indexToSelect);
            productItemContainerToSelect.classList.add("selected");
        } else if (key === "Enter") {

            ///Enter End 25.feb
            if (indexToSelect === -1) {
                return;
            } else {
                const productIdToSelect = filteredProducts[indexToSelect].category_id.toString();
                for (let j = 0; j < jsonResponse.length; j++) {
                    if (productIdToSelect == jsonResponse[j].category_id) {
                        console.log(jsonResponse[j].category_name);
                    }
                }
            }
            //End 25.feb
        } else {
            resultContainerTag.innerHTML = "";
            indexToSelect = -1;
        }
    }

    const selectProduct = (indexToSelect) => {
        const productIdToSelect = filteredProducts[indexToSelect].category_id.toString();
        const productItemContainerToSelect = document.getElementById(
            productIdToSelect
        );
        productItemContainerToSelect.style.backgroundColor = "#237BFF";
        productItemContainerToSelect.firstChild.style.color = "white";
        return productItemContainerToSelect;
    };

    const deselectProduct = () => {
        const productToDeselect = document.getElementsByClassName("selected")[0];
        productToDeselect.style.backgroundColor = "#fff";
        productToDeselect.firstChild.style.color = "black";
        productToDeselect.classList.remove("selected");
    };
}

apiCall();




