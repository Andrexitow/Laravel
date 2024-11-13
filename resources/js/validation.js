function removeError(input) {
    if (input.value.trim() !== "") {
        input.classList.remove("border-red-500", "focus:border-red-500", "focus:ring-red-500");
        input.classList.add("border-gray-300", "dark:border-gray-600");
        const errorText = document.getElementById("nameError");
        if (errorText) errorText.style.display = "none";
    }
}

window.removeError = removeError;