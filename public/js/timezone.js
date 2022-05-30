const setTimezone = function() {
  const timezone = moment.tz.guess();
  document.cookie="timezone=" + timezone + ";path=/";
};

document.addEventListener('DOMContentLoaded', setTimezone);