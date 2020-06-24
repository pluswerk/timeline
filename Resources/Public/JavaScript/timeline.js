document.addEventListener('DOMContentLoaded', function () {
  var timelineElements = document.getElementsByClassName('js-timeline');
  [].forEach.call(timelineElements, function (timeline) {
    var epochElements = timeline.getElementsByClassName('js-timeline-epoch');
    var totalDayCount = timeline.dataset.totaldaycount;
    var currentWidthPercentage = 0;

    var index = 0;
    [].forEach.call(epochElements, function (epoch) {
      var epochWidth = 0;
      var epochDayCount = parseInt(epoch.dataset.daycount, 10);
      var momentWrappers = epoch.getElementsByClassName('js-moment-wrapper');

      if (index === epochElements.length - 1) {
        epochWidth = 100 - currentWidthPercentage;
      } else {
        epochWidth = Math.round(epochDayCount / totalDayCount * 100);
      }

      epoch.style.width = epochWidth + '%';
      currentWidthPercentage += epochWidth;
      index++;

      [].forEach.call(momentWrappers, function (momentWrapper) {
        var moment = momentWrapper.querySelector('.js-moment');
        var tooltip = momentWrapper.querySelector('.js-tooltip');

        var dayOfEpoch = parseInt(moment.dataset.dayofepoch);
        moment.style.left = Math.round(dayOfEpoch / epochDayCount * 100) + '%';

        var popper = Popper.createPopper(moment, tooltip, {
          placement: 'top',
        });

        function show() {
          tooltip.setAttribute('data-show', '');
          popper.update();
        }

        function hide() {
          tooltip.removeAttribute('data-show');
        }

        const showEvents = ['mouseenter', 'focus'];
        const hideEvents = ['mouseleave', 'blur'];

        showEvents.forEach(function(event) {
          moment.addEventListener(event, show);
        });

        hideEvents.forEach(function(event) {
          moment.addEventListener(event, hide);
        });
      });
    });
  });
});
