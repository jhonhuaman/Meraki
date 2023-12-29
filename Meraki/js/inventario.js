const navCongelados = document.querySelector(".congelados");
const navRefrigerados = document.querySelector(".refrigerados");
const navSecos = document.querySelector(".secos");
const navLimpieza = document.querySelector(".limpieza");
const navPublicidad = document.querySelector(".publicidad");

navCongelados.addEventListener("click", (e) => {
    e.preventDefault();

    const congeladosSection = document.querySelector(".congeladosSection");
    congeladosSection.scrollIntoView({behavior: "smooth"});
})

navRefrigerados.addEventListener("click", (e) => {
    e.preventDefault();

    const refrigeradosSection = document.querySelector(".refrigeradosSection");
    refrigeradosSection.scrollIntoView({behavior: "smooth"});
})

navSecos.addEventListener("click", (e) => {
    e.preventDefault();

    const secosSection = document.querySelector(".secosSection");
    secosSection.scrollIntoView({behavior: "smooth"});
})

navLimpieza.addEventListener("click", (e) => {
    e.preventDefault();

    const limpiezaSection = document.querySelector(".limpiezaSection");
    limpiezaSection.scrollIntoView({behavior: "smooth"});
})

navPublicidad.addEventListener("click", (e) => {
    e.preventDefault();

    const publicidadSection = document.querySelector(".publicidadSection");
    publicidadSection.scrollIntoView({behavior: "smooth"});
})