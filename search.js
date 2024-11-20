const searchInput = document.getElementById('searchInput');
const suggestionsDiv = document.getElementById('suggestions');

// Event listener for input field
searchInput.addEventListener('input', function() {
    const userInput = searchInput.value.trim();

    // Clear previous suggestions
    suggestionsDiv.innerHTML = '';

    // Fetch suggestions from server
    if (userInput.length > 0) {
        fetchSuggestions(userInput);
    }
});

// Function to fetch suggestions from server
function fetchSuggestions(userInput) {
    fetch('suggest_locations.php?query=' + userInput)
    .then(response => response.json())
    .then(data => {
        // Display suggestions
        data.forEach(suggestion => {
            const suggestionItem = document.createElement('div');
            suggestionItem.textContent = suggestion.name;
            suggestionItem.classList.add('suggestion');
            suggestionsDiv.appendChild(suggestionItem);
        });
    })
    .catch(error => console.error('Error fetching suggestions:', error));
}
