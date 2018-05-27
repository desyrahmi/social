$(document).ready(function() {
  const initials = JSON.parse($('data').attr('initials'));
  document.getElementById("role-name").value = initials.role.name;
  document.getElementById("role-display-name").value = initials.role.display_name;
  document.getElementById("role-description").value = initials.role.description;

});