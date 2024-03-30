function nextSection(section) {
    var currentSection = document.getElementById(section + 'Section');
    currentSection.style.display = 'none';

    var nextSection = document.getElementById(section + 'sSection');
    nextSection.style.display = 'block';
}
