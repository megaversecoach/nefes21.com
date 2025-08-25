function banner() {
};
banner = new banner();
number = 0;
 
// rastgelegetir
banner[number++] = "<a href='https://nefes21.online/'><img src='https://nefes21.com/ads/1500x400.png'>"
banner[number++] = "<a href='https://nefes21.online/'><img src='https://nefes21.com/ads/m1500x400.png'>"
banner[number++] = "<a href='https://nefes21.online/'><img src='https://nefes21.com/ads/mm1500x400.png'>"
banner[number++] = "<a href='https://nefes21.online/'><img src='https://nefes21.com/ads/t1500x400.png'>"

increment = Math.floor(Math.random() * number);
document.write(banner[increment]);