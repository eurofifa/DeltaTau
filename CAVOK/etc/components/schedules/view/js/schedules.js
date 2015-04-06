$(document).ready(function() {
    $('.calendar').fullCalendar({
        googleCalendarApiKey: 'AIzaSyAnq3yS_ZcFy8DqKhFR7r7tjbwY2v8egA0',
        eventSources: [
            {
                /*JDA*/
                googleCalendarId: 'ldkpjjqkcukhfj5o0jjnvfjiuk@group.calendar.google.com'
            },
            {
                /*JDU*/
                googleCalendarId: 'oovh0jmpb6u3sn0jhrdqa7v018@group.calendar.google.com'
            },
            {
                /*VOK*/
                googleCalendarId: '0js9n73ajnv4mehbnvb1u9him4@group.calendar.google.com'
            },
            {
                /*VOA*/
                googleCalendarId: '7nuap1lkq9vei154p0jmj8p9cs@group.calendar.google.com'
            },
            {
                /*VOB*/
                googleCalendarId: '949oraov1hedk0m5730p0nfl5s@group.calendar.google.com'
            },
            {
                /*VOE*/
                googleCalendarId: 'onf5rj0civa76k8v53i5d30fek@group.calendar.google.com'
            }
        ]
    });
});
