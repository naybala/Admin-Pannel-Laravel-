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
        resultContainerTag.innerHTML = "";
        const searchText = e.target.value.toLowerCase();
        if (searchText.length === 0) {
            return;
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
}
apiCall();




