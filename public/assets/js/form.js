document.addEventListener("DOMContentLoaded", function () {
    var d = document.querySelectorAll("input[type=radio]");
    d.forEach((element) => {
        element.addEventListener("click", function (event) {
            event.target.parentElement.parentElement.classList = "";
            switch (event.target.value) {
                case "uygun":
                    event.target.parentElement.parentElement.classList.add(
                        "table-success"
                    );
                    break;
                case "uygun_degil":
                    event.target.parentElement.parentElement.classList.add(
                        "table-danger"
                    );
                    break;
                default:
                    event.target.parentElement.parentElement.classList.add(
                        "table-warning"
                    );
            }
        });
    });
});
