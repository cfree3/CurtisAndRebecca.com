$(function() {

    var images = [
        'cozumelcruise.jpg',
        'gtbanduniform.jpg',
        'hands.jpg',
        'lounge.jpg',
        'loveseat.jpg',
        'seniorprom.jpg',
        'smiles.jpg',
        'wedding_beside.jpg',
        'wedding_cake.jpg'
    ];

    var suffixes = [
        'into eternity',
        'of happiness'
    ];

    var photo = $('#photo');

    var handle = null;

    var randomImage = function() {
        clearTimeout(handle);
        photo.attr('src', 'img/' + images[Math.floor(images.length * Math.random())]);
        handle = setTimeout(randomImage, 2000);
    }

    photo.click(randomImage);

    randomImage();

    var since = $('#since');
    var stats = $('#stats');

    since.click(function() {
        since.fadeOut(200, function() {
            stats.fadeIn();
        });
    });

    var oxfordJoin = function(words) {

        if (words.length == 1) {
            return words[0];
        }

        if (words.length == 2) {
            return words[0] + ' and ' +words [1];
        }

        words[words.length - 1] = 'and ' + words[words.length - 1];
        return words.join(', ');

    }

    var howLong = function() {
        var since = moment('2005-02-11T00:00:00-05:00', moment.ISO_8601); // Feb. 11, 2005 (EST)
        var now = moment();

        var time = [];

        // years and months are straightforward
        {
            var years = now.diff(since, 'years');
            if (years > 0) {
                time.push(years + ' year' + (years > 1 ? 's' : ''));
            }
        }
        {
            var months = now.diff(since, 'months') % 12;
            if (months > 0) {
                time.push(months + ' month' + (months > 1 ? 's' : ''));
            }
        }
        {
            var days = now.date() - 11;
            if (days < 0) { // how many days of last month after the 11th
                days += moment(now).subtract('1', 'months').daysInMonth();
            }
            if (days > 0) {
                time.push(days + ' day' + (days > 1 ? 's' : ''));
            }
        }

        stats.html(oxfordJoin(time) + ' ' + suffixes[Math.floor(suffixes.length * Math.random())] + '&hellip;');
    };

    howLong();

});
