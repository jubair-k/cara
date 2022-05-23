document.addEventListener('DOMContentLoaded',function(){
    const container = document.getElementById("imgContainer");
    const img = document.querySelector("#imgContainer img");

    container.addEventListener("mousemove", (e) => {
        const x = e.clientX - e.target.offsetLeft;
        const y = e.clientY - e.target.offsetTop;

        img.style.transformOrigin = `${x}px ${y}px`;
        img.style.transform = "scale(2)";
    });

    container.addEventListener("mouseleave", () => {
        img.style.transformOrigin = "center center";
        img.style.transform = "scale(1)";
    });

})