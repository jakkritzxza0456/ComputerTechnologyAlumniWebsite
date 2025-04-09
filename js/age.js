moment.updateLocale('th', {
    durationLabelsStandard: {
        S: 'millisecond',
        SS: 'milliseconds',
        s: 'ว',
        ss: 'วินาที',
        m: 'นาที',
        mm: 'นาที',
        h: 'ชม.',
        hh: 'ชั่วโมง',
        d: 'ว',
        dd: 'วัน',
        w: 'สัปดาห์',
        ww: 'สัปดาห์',
        M: 'เดือน',
        MM: 'เดือน',
        y: 'ป',
        yy: 'ปี'
    }
});

function calAge() {
  var date = document.getElementById("birthday").value;
  console.log(date)
  var diff = moment(date).diff(moment(), 'milliseconds');
  var duration = moment.duration(diff);
  document.getElementById("birthday").innerHTML =duration.format().replace("-","");
}

calAge();

// ref: https://stackoverflow.com/a/38161330/2462784
// ref: https://github.com/jsmreese/moment-duration-format