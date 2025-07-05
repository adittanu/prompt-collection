// Reset theme script - run this in browser console if needed
function resetTheme() {
    localStorage.removeItem("theme");
    document.documentElement.classList.remove("dark");
    location.reload();
}

// Auto-run reset
console.log("Resetting theme...");
resetTheme();
