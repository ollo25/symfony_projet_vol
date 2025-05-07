document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("myPopup");
    const trigger = document.querySelector(".popup");

    // Toggle le popup au clic sur le nom
    trigger.addEventListener("click", function (event) {
        event.stopPropagation(); // Empêche la propagation vers document
        popup.classList.toggle("show");
    });

    // Empêche la fermeture si on clique dans le popup lui-même
    popup.addEventListener("click", function (event) {
        event.stopPropagation();
    });

    // Ferme le popup si on clique ailleurs
    document.addEventListener("click", function () {
        popup.classList.remove("show");
    });
});