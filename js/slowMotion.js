function slowMo() {
    // checkbox
    var checkbox = document.getElementById("checkbox");

    // video
    var vid = document.getElementById("video");

    if (checkbox.checked) {
        // activate slow motion
        vid.playbackRate = 0.5;
    } else {
        // resume normal speed
        vid.playbackRate = 1;
    }
}
