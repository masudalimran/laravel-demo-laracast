const calculateFileSize = (size) => {
    if (size) {
        if (size / 1000000 > 1) {
            return (size / 1000000).toFixed(2) + " mb";
        } else {
            return (size / 1000).toFixed(2) + " kb";
        }
    }
    return "N/A";
};

window.calculateFileSize = calculateFileSize;
