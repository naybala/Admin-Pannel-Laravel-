MySql.Execute(
    "127.0.0.1",
    "root",
    "pizza",
    "select * from Order",
    function (data) {
        console.log(data)
    });


const autoCompleteInputTag = document.querySelector(".table_search", [0]);

// let filteredProducts = [];

// autoCompleteInputTag.addEventListener("keyup", (e) => {
//     // console.log(e.key);
//     //adding Keyboard Function
//     if (
//         e.key === "ArrowDown" ||
//         e.key === "ArrowUp" ||
//         e.key === "Enter"
//     ) {
//         navigateAndSelectProduct(e.key);
//         return;
//     }

//     //adding Keyboard Function End

//     //Filter Show Search Result
//     resultContainerTag.innerHTML = "";
//     const searchText = e.target.value.toLowerCase();
//     if (searchText.length === 0) {
//         return;
//     }
//     filteredProducts = products.filter((product) => {
//         return product.title.toLowerCase().includes(searchText);
//     });

//     if (filteredProducts.length > 0) {
//         for (let i = 0; i < filteredProducts.length; i++) {
//             const productItemContainer = document.createElement("div");
//             productItemContainer.id = filteredProducts[i].id;
//             productItemContainer.classList.add("productItemContainer");

//             const productId = document.createElement("div");
//             productId.classList.add("productId");
//             productId.append(filteredProducts[i].id);

//             const productName = document.createElement("div");
//             productName.classList.add("productName");
//             productName.append(filteredProducts[i].title);

//             const productImage = document.createElement("img");
//             productImage.classList.add("productImage");
//             productImage.src = filteredProducts[i].image;

//             productItemContainer.append(productId, productName, productImage);
//             resultContainerTag.append(productItemContainer);
//             //Filter Show Search Result End
//         }
//     }
// });

// let indexToSelect = -1;
// const navigateAndSelectProduct = (key) => {
//     if (key === "ArrowDown") {
//         if (indexToSelect == filteredProducts.length) {
//             indexToSelect = 0;
//         }
//         if (indexToSelect === filteredProducts.length - 1) {
//             indexToSelect = -1;
//             deselectProduct();
//             return;
//         }
//         indexToSelect += 1;
//         const productItemContainerToSelect = selectProduct(indexToSelect);
//         if (indexToSelect > 0) {
//             deselectProduct();
//         }
//         productItemContainerToSelect.classList.add("selected");
//     } else if (key === "ArrowUp") {
//         if (indexToSelect === -1) {
//             return;
//         }

//         if (indexToSelect === 0) {
//             indexToSelect = filteredProducts.length;
//             return;
//         }
//         indexToSelect -= 1;
//         deselectProduct();
//         const productItemContainerToSelect = selectProduct(indexToSelect);
//         productItemContainerToSelect.classList.add("selected");
//     } else {

//         ///Enter End 25.feb
//         if (indexToSelect === -1) {
//             return;
//         } else {
//             const productIdToSelect = filteredProducts[indexToSelect].id.toString();
//             for (let j = 0; j < products.length; j++) {
//                 if (productIdToSelect == products[j].id) {
//                     console.log(products[j].title);
//                 }
//             }
//         }
//         //End 25.feb
//     }
// }

// const selectProduct = (indexToSelect) => {
//     const productIdToSelect = filteredProducts[indexToSelect].id.toString();
//     const productItemContainerToSelect = document.getElementById(
//         productIdToSelect
//     );
//     productItemContainerToSelect.style.backgroundColor = "#237BFF";
//     productItemContainerToSelect.firstChild.style.color = "white";
//     return productItemContainerToSelect;
// };

// const deselectProduct = () => {
//     const productToDeselect = document.getElementsByClassName("selected")[0];
//     productToDeselect.style.backgroundColor = "white";
//     productToDeselect.firstChild.style.color = "black";
//     productToDeselect.classList.remove("selected");
// };




