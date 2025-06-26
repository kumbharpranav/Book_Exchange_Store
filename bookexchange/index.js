    // Hiding controls using CSS pseudo selectors
    var vids = $("video");
    $.each(vids, function() {
        this.controls = false;
    });

    // Toggle play/pause on click (optional)
    $("video").click(function() {
        if (this.paused) {
            this.play();
        } else {
            this.pause();
        }
    });



    // script.js
// script.js
const searchInput = document.getElementById('search-input');
const suggestionList = document.getElementById('suggestions');

const keywords = [
    'apple',
    'banana',
    'cherry',
    // Add more keywords as needed
];

searchInput.addEventListener('input', handleInput);
suggestionList.addEventListener('click', handleSuggestionClick);

function handleInput() {
    const userInput = searchInput.value.toLowerCase();
    const matchingSuggestions = keywords.filter(keyword =>
        keyword.toLowerCase().startsWith(userInput)
    );

    displaySuggestions(matchingSuggestions);
}

function displaySuggestions(suggestions) {
    suggestionList.innerHTML = '';
    suggestions.forEach(suggestion => {
        const suggestionItem = document.createElement('div');
        suggestionItem.textContent = suggestion;
        suggestionList.appendChild(suggestionItem);
    });
}

function handleSuggestionClick(event) {
    if (event.target.tagName === 'DIV') {
        searchInput.value = event.target.textContent;
        suggestionList.innerHTML = ''; // Clear suggestions after selection
    }
}







