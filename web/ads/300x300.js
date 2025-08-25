function banner() {
};
banner = new banner();
number = 0;
 
// rastgelegetir
banner[number++] = "<a href='http://nefes21.academy/event-details/E023A35FI/b%C3%BClent-gardiyano%C4%9Flu---aile-i%C3%A7i-tak%C4%B1m-%C3%87al%C4%B1%C5%9Fmas%C4%B1-8-kas%C4%B1m-2020-pazar'><img src='https://nefes21.com/ads/8kasim.png'>"
banner[number++] = "<a href='http://nefes21.academy/event-details/E019YWP21/emine-gardiyano%C4%9Flu---evrensel-%C4%B0saretleri-okumak-b%C3%B6l%C3%BCm-1---7-kas%C4%B1m-2020-cumartesi'><img src='https://nefes21.com/ads/7kasim.png'>"

increment = Math.floor(Math.random() * number);
document.write(banner[increment]);

