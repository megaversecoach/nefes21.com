import React, { useEffect } from 'react';

const App = () => {
  useEffect(() => {
    // Load Tailwind CSS dynamically (for standalone deployment)
    const link = document.createElement('link');
    link.href = 'https://cdn.tailwindcss.com ';
    link.rel = 'stylesheet';
    document.head.appendChild(link);

    // Load Chart.js dynamically
    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/chart.js ';
    script.async = true;
    document.body.appendChild(script);

    // Initialize the chart after scripts are loaded
    script.onload = () => {
      const tooltipTitleCallback = (tooltipItems) => {
        const item = tooltipItems[0];
        let label = item.label || '';
        if (Array.isArray(label)) {
          return label.join(' ');
        } else {
          return label;
        }
      };

      const chartDefaultOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              color: '#333333',
              font: {
                family: "'Inter', sans-serif",
              },
            },
          },
          tooltip: {
            callbacks: {
              title: tooltipTitleCallback,
            },
          },
        },
        scales: {
          y: {
            ticks: {
              color: '#333333',
              font: {
                family: "'Inter', sans-serif",
              },
            },
            grid: {
              color: 'rgba(0, 0, 0, 0.05)',
            },
          },
          x: {
            ticks: {
              color: '#333333',
              font: {
                family: "'Inter', sans-serif",
              },
            },
            grid: {
              display: false,
            },
          },
        },
      };

      const growthLabels = ['2026', '2027', '2028', '2029', '2030', '2031'];

      const ctx = document.getElementById('growthProjectionChart').getContext('2d');
      new window.Chart(ctx, {
        type: 'bar',
        data: {
          labels: growthLabels,
          datasets: [
            {
              type: 'line',
              label: 'Aboneler (Bin)',
              data: [5, 100, 300, 500, 750, 1000],
              borderColor: '#FF9F1C',
              backgroundColor: '#FF9F1C',
              yAxisID: 'y1',
              tension: 0.3,
              fill: false,
              pointBackgroundColor: '#FF6B35',
              pointBorderColor: '#fff',
              pointHoverBackgroundColor: '#fff',
              pointHoverBorderColor: '#FF9F1C',
              pointRadius: 5,
              pointHoverRadius: 8,
            },
            {
              label: 'Ciro (Milyon €)',
              data: [0.71, 14.3, 42.9, 71.5, 107.2, 143],
              backgroundColor: '#FF6B35',
              yAxisID: 'y',
            },
          ],
        },
        options: {
          ...chartDefaultOptions,
          scales: {
            y: {
              beginAtZero: true,
              position: 'left',
              title: { display: true, text: 'Ciro (Milyon €)', color: '#333333' },
              ticks: { color: '#333333', font: { family: "'Inter', sans-serif" } },
              grid: { color: 'rgba(0, 0, 0, 0.05)' },
            },
            y1: {
              beginAtZero: true,
              position: 'right',
              title: { display: true, text: 'Aboneler (Bin)', color: '#333333' },
              grid: {
                drawOnChartArea: false,
              },
              ticks: { color: '#333333', font: { family: "'Inter', sans-serif" } },
            },
            x: {
              ticks: { color: '#333333', font: { family: "'Inter', sans-serif" } },
              grid: { display: false },
            },
          },
        },
      });
    };
  }, []);

  return (
    <div className="font-inter bg-[#FFF8E1] text-gray-800 scroll-smooth">
      {/* Header */}
      <header className="bg-white sticky top-0 z-50 shadow-md">
        <nav className="container mx-auto px-6 py-4 flex justify-between items-center">
          <h1 className="text-2xl font-bold text-[#333333]">Nefes21</h1>
          <div className="hidden md:flex space-x-8">
            <a href="#giris" className="text-gray-600 hover:text-[#FF6B35]">Giriş</a>
            <a href="#cozum" className="text-gray-600 hover:text-[#FF6B35]">Çözüm</a>
            <a href="#buyume_potansiyeli" className="text-gray-600 hover:text-[#FF6B35]">Büyüme</a>
            <a href="#inovasyon" className="text-gray-600 hover:text-[#FF6B35]">İnovasyon</a>
            <a href="#yatirim" className="text-gray-600 hover:text-[#FF6B35]">Yatırım</a>
            <a href="#neden_yatirim" className="text-gray-600 hover:text-[#FF6B35]">Neden Biz?</a>
          </div>
        </nav>
      </header>

      {/* Hero Section */}
      <section id="giris" className="text-center py-16 px-4 bg-gradient-to-r from-[#FF6B35] to-[#FFC43D] text-white rounded-2xl shadow-xl mb-12">
        <h2 className="text-4xl md:text-6xl font-black mb-4 text-shadow-custom">Uluslararası Kişisel Gelişim Platformu (Çok Dilde)</h2>
        <p className="max-w-4xl mx-auto text-xl md:text-2xl font-light mb-8">
          Bilinçli Farkındalık ve Huzurlu Yaşam Portalı
        </p>
        <div className="flex justify-center mb-8">
          <span className="text-8xl">✨</span>
        </div>
        <p className="max-w-3xl mx-auto text-lg mb-12">
          Nefes21, insanların daha bilinçli, mutlu ve sağlıklı bir yaşam sürmelerine yardımcı olmak, farkındalıklarını artırmak ve küresel bir refah topluluğu oluşturmak için yola çıkmıştır.
        </p>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
          <div className="bg-white p-6 rounded-xl shadow-lg text-[#333333]">
            <div className="text-5xl font-black text-[#FF6B35] mb-2">$1M</div>
            <p className="text-lg font-bold">İlk Yıl Yatırım Hedefi</p>
            <p className="text-sm text-gray-600">Hızlı büyüme ve platform entegrasyonu için.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg text-[#333333]">
            <div className="text-5xl font-black text-[#FFC43D] mb-2">1M+</div>
            <p className="text-lg font-bold">Abone Hedefi</p>
            <p className="text-sm text-gray-600">5 yıl içinde küresel liderlik.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg text-[#333333]">
            <div className="text-5xl font-black text-[#FF9F1C] mb-2">140M+€</div>
            <p className="text-lg font-bold">Yıllık Ciro Potansiyeli</p>
            <p className="text-sm text-gray-600">Sürdürülebilir ve yüksek getiri.</p>
          </div>
        </div>
      </section>

      {/* Problem and Opportunity */}
      <section id="problem_firsat" className="bg-white p-8 rounded-2xl shadow-xl mb-12">
        <h3 className="text-3xl font-bold section-header text-[#333333] text-center">Problem ve Fırsat: Küresel Wellness Pazarındaki Boşluk</h3>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
          <div>
            <p className="text-gray-700 mb-4">Günümüz dünyasında artan stres, kaygı ve kişisel tatminsizlik, bireylerde daha bilinçli, mutlu ve sağlıklı bir yaşam arayışını tetiklemektedir. Küresel wellness pazarı, sürekli büyüyen milyar dolarlık bir endüstri haline gelmiştir. Pandemi sonrası kişisel gelişim ve ruh sağlığına olan ilgi zirve yapmış durumdadır.</p>
            <p className="text-gray-700 font-semibold">Ancak pazarda bütünsel, güvenilir ve entegre bir çözüm eksikliği göze çarpmaktadır. Nefes21, kanıtlanmış geçmişi ve yenilikçi yaklaşımıyla bu boşluğu doldurma ve küresel bir lider olma fırsatını yakalamıştır.</p>
          </div>
          <div className="flex justify-center items-center h-full">
            <span className="text-8xl text-[#FF6B35] opacity-70">💡</span>
          </div>
        </div>
      </section>

      {/* Proven Success */}
      <section id="kanitlanmis_basari" className="py-12">
        <h3 className="text-3xl font-bold section-header text-[#333333] text-center">Kanıtlanmış Başarı Geçmişimiz</h3>
        <div className="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
          <div className="bg-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-300">
            <div className="text-5xl mb-2">🏆</div>
            <p className="font-bold text-lg text-[#FF6B35]">2 Kez Apple "Featured"</p>
            <p className="text-sm text-gray-500">Apple tarafından kalitesi ve içeriğiyle önerilen uygulama.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-300">
            <div className="text-5xl mb-2">🥈</div>
            <p className="font-bold text-lg text-[#FFC43D]">Türkiye'de #2 Numara</p>
            <p className="text-sm text-gray-500">Sağlık kategorisinde 6 hafta boyunca zirveye ortak oldu.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-300">
            <div className="text-5xl mb-2">⬇️</div>
            <p className="font-bold text-lg text-[#FF9F1C]">10.000+ Günlük İndirme</p>
            <p className="text-sm text-gray-500">Apple ve Play Store'da organik büyüme başarısı.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-300">
            <div className="text-5xl mb-2">⭐</div>
            <p className="font-bold text-lg text-[#FFDDAA]">4+ Memnuniyet Puanı</p>
            <p className="text-sm text-gray-500">Yüz binlerce kullanıcıdan gelen yüksek beğeni oranı.</p>
          </div>
        </div>
        <p className="text-center text-gray-600 mt-8 max-w-3xl mx-auto">2012'de dünyanın ilk kişisel gelişim uygulaması olarak piyasaya sürülen Nefes21, 2022'deki siber saldırıdan aldığı derslerle daha güçlü ve güvenli bir yapıya evrildi.</p>
      </section>

      {/* Solution */}
      <section id="cozum" className="bg-white p-8 rounded-2xl shadow-xl mb-12">
        <h3 className="text-3xl font-bold section-header text-[#333333] text-center">Çözüm: Entegre Nefes21 Platformu</h3>
        <p className="text-center text-gray-600 mb-10 max-w-2xl mx-auto">Dağınık dijital varlıklarımızı tek, güçlü bir web sitesi ve mobil uygulamada birleştirerek, kullanıcı deneyimini ve erişimi maksimize ediyoruz.</p>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-center">
          <div className="lg:col-span-2 flex flex-col items-center">
            <div className="grid grid-cols-2 gap-4">
              <div className="flowchart-node bg-[#FFDDAA] p-4 rounded-lg shadow text-[#333333] font-bold">nefes21.com</div>
              <div className="flowchart-node bg-[#FFDDAA] p-4 rounded-lg shadow text-[#333333] font-bold">nefes21.academy</div>
              <div className="flowchart-node bg-[#FFDDAA] p-4 rounded-lg shadow text-[#333333] font-bold">kisiselgelisim.tv</div>
              <div className="flowchart-node bg-[#FFDDAA] p-4 rounded-lg shadow text-[#333333] font-bold">nefes21.org</div>
            </div>
            <div className="arrow-down mt-4 w-1 h-10 bg-[#FF9F1C]"></div>
            <p className="text-xl font-bold text-[#333333] mt-2">Mevcut 10.000 Günlük Ziyaretçi</p>
          </div>
          <div className="lg:col-span-1 flex justify-center items-center">
            <div className="w-1 h-10 bg-[#FF9F1C] rotate-90 md:rotate-0 relative">
              <div className="absolute right-0 top-0 border-t-8 border-b-8 border-l-12 border-transparent border-l-[#FF9F1C]"></div>
            </div>
          </div>
          <div className="lg:col-span-2 flex flex-col items-center">
            <div className="bg-gradient-to-r from-[#FF6B35] to-[#FFC43D] text-white p-6 rounded-xl shadow-lg text-center">
              Tek Entegre Platform
              <p className="text-sm mt-1">(Web + Mobil Uygulama)</p>
            </div>
            <div className="arrow-down mt-4 w-1 h-10 bg-[#FF9F1C]"></div>
            <p className="text-3xl font-black text-[#FF6B35] mt-2">Hedef: 50.000+ Günlük Ziyaretçi</p>
          </div>
        </div>
        <h4 className="text-2xl font-bold text-center mt-12 mb-6 text-[#333333]">Yeni Platformun Gelir Modelleri</h4>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div className="bg-gray-50 p-6 rounded-lg shadow-sm">
            <p className="font-bold text-gray-800 text-lg mb-1">🎙️ Podcast Yayınları</p>
            <p className="text-sm text-gray-600">Ücretli abonelik modeliyle özel içerikler sunulacaktır.</p>
          </div>
          <div className="bg-gray-50 p-6 rounded-lg shadow-sm">
            <p className="font-bold text-gray-800 text-lg mb-1">📝 Blog Yazıları</p>
            <p className="text-sm text-gray-600">Ücretsiz erişim ve platform içi reklam gelirleri hedeflenecektir.</p>
          </div>
          <div className="bg-gray-50 p-6 rounded-lg shadow-sm">
            <p className="font-bold text-gray-800 text-lg mb-1">📺 7/24 Kişisel Gelişim TV</p>
            <p className="text-sm text-gray-600">Ücretsiz canlı yayınlar ve platform içi reklam gelirleri sağlanacaktır.</p>
          </div>
          <div className="bg-gray-50 p-6 rounded-lg shadow-sm">
            <p className="font-bold text-gray-800 text-lg mb-1">🎓 Nefes21 Akademi Eğitimleri</p>
            <p className="text-sm text-gray-600">Ücretli ve sertifikalı online eğitim programları sunulacaktır.</p>
          </div>
          <div className="bg-gray-50 p-6 rounded-lg shadow-sm">
            <p className="font-bold text-gray-800 text-lg mb-1">🕒 2-3 Saatlik Video Atölyeleri</p>
            <p className="text-sm text-gray-600">Belirli konulara odaklanmış, ücretli atölye eğitimleri yapılacaktır.</p>
          </div>
          <div className="bg-gray-50 p-6 rounded-lg shadow-sm">
            <p className="font-bold text-gray-800 text-lg mb-1">💰 Esnek Abonelik Seçenekleri</p>
            <p className="text-sm text-gray-600">1 Aylık (14.99€), 6 Aylık (69€), Yıllık (119€) seçenekleri sunulacaktır.</p>
          </div>
        </div>
      </section>

      {/* Growth Potential */}
      <section id="buyume_potansiyeli" className="py-12 bg-white p-8 rounded-2xl shadow-xl mb-12">
        <h3 className="text-3xl font-bold section-header text-[#333333] text-center">Pazar ve Büyüme Potansiyeli</h3>
        <p className="text-center text-gray-600 mb-10 max-w-2xl mx-auto">Küresel wellness pazarında benzersiz bir konumda yer alarak, agresif büyüme hedeflerimizle pazar liderliğini hedefliyoruz.</p>
        <div className="chart-container h-[500px] max-h-[500px]">
          <canvas id="growthProjectionChart"></canvas>
        </div>
        <p className="text-sm text-center text-gray-500 mt-4">Grafik, abone sayısındaki (çizgi) istikrarlı artış ile buna paralel olarak yükselen yıllık ciroyu (çubuklar) göstermektedir.</p>
      </section>

      {/* Innovation */}
      <section id="inovasyon" className="py-12">
        <h3 className="text-3xl font-bold section-header text-[#333333] text-center">İnovasyon ve Gelecek Vizyonu</h3>
        <p className="text-center text-gray-600 mb-10 max-w-2xl mx-auto">Kullanıcı deneyimini zenginleştirmek ve pazar liderliğini pekiştirmek için sürekli inovasyonu benimsiyoruz.</p>
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <div className="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
            <h4 className="font-bold text-xl mb-2 text-[#FF6B35]">Yapay Zeka Koçluk</h4>
            <p className="text-gray-600">Kişiye özel içerik önerileri ve gelişim takibi ile kullanıcı deneyimini zirveye taşıma.</p>
          </div>
          <div className="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
            <h4 className="font-bold text-xl mb-2 text-[#FFC43D]">Oyunlaştırma</h4>
            <p className="text-gray-600">Görevler, rozetler ve ödüllerle kullanıcı motivasyonunu ve platforma bağlılığını artırma.</p>
          </div>
          <div className="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
            <h4 className="font-bold text-xl mb-2 text-[#FF9F1C]">Kurumsal Refah (B2B)</h4>
            <p className="text-gray-600">Şirketlere özel sağlık ve kişisel gelişim çözümleri sunarak yeni gelir kanalları yaratma.</p>
          </div>
          <div className="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
            <h4 className="font-bold text-xl mb-2 text-[#FF6B35]">Bilimsel İş Birlikleri</h4>
            <p className="text-gray-600">Üniversitelerle Ar-Ge projeleri yürüterek kanıta dayalı ve güvenilir içerikler sunma.</p>
          </div>
          <div className="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
            <h4 className="font-bold text-xl mb-2 text-[#FFC43D]">Global Elçi Programı</h4>
            <p className="text-sm text-gray-600">Yerel topluluk liderleriyle iş birliği yaparak organik ve güvene dayalı büyüme sağlama.</p>
          </div>
          <div className="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
            <h4 className="font-bold text-xl mb-2 text-[#FF9F1C]">VR/AR Deneyimleri</h4>
            <p className="text-gray-600">Sürükleyici meditasyon ve sanal atölyeler ile kişisel gelişimi yeni bir boyuta taşıma.</p>
          </div>
        </div>
        <h4 className="text-2xl font-bold text-center mt-12 mb-6 text-[#333333]">Nihai Vizyon: Küresel Wellness Topluluğu ve Yavaş Yaşam Köyleri</h4>
        <p className="text-center text-gray-600 mb-8 max-w-3xl mx-auto">Dijital topluluğumuzu, dünyanın dört bir yanındaki fiziksel refah ve detoks merkezleriyle buluşturarak benzersiz bir hibrit deneyim sunacağız.</p>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div className="relative h-80 rounded-2xl shadow-xl overflow-hidden group">
            <img src="https://placehold.co/600x400/FF6B35/FFFFFF?text=Görsel+Yüklenemedi" alt="Küresel Wellness Topluluğu Görseli" className="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" />
            <div className="absolute inset-0 bg-black bg-opacity-40 flex items-end p-6">
              <h4 className="text-white text-2xl font-bold">Küresel Wellness Topluluğu</h4>
            </div>
          </div>
          <div className="relative h-80 rounded-2xl shadow-xl overflow-hidden group">
            <img src=" https://placehold.co/600x400/FFC43D/FFFFFF?text=Görsel+Yüklenemedi" alt="Yavaş Yaşam Köyü Görseli" className="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" />
            <div className="absolute inset-0 bg-black bg-opacity-40 flex items-end p-6">
              <h4 className="text-white text-2xl font-bold">Yavaş Yaşam Köyleri</h4>
            </div>
          </div>
        </div>
      </section>

      {/* Investment */}
      <section id="yatirim" className="bg-white p-8 rounded-2xl shadow-xl mb-12">
        <h3 className="text-3xl font-bold section-header text-[#333333] text-center">Ekip ve Yatırım</h3>
        <p className="text-center text-gray-600 mb-8 max-w-2xl mx-auto">Deneyimli liderliğimiz ve stratejik yatırım planımızla geleceğe güvenle yürüyoruz.</p>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div>
            <h4 className="text-2xl font-bold text-[#FF6B35] mb-4">Lider Ekip</h4>
            <p className="text-gray-700 mb-2"><span className="font-bold">Kurucu:</span> Bülent Gardiyanoğlu (Kişisel gelişim alanında yılların deneyimi, tanınmış bir isim).</p>
            <p className="text-gray-700 mb-2"><span className="font-bold">Uzman Ekip:</span> Teknoloji, UI/UX, içerik geliştirme ve pazarlama alanlarında uzmanlaşmış dinamik bir ekip.</p>
            <p className="text-gray-700">Güçlü danışmanlar ve uluslararası ortaklık hedefleri.</p>
          </div>
          <div>
            <h4 className="text-2xl font-bold text-[#FFC43D] mb-4">Yatırım Talebi ve Dağılımı ($1 Milyon)</h4>
            <p className="text-gray-700 mb-4">Projenin başlangıç ve hızlı büyüme fazı için talep edilen $1 Milyonluk yatırımın tamamı, ilk yıl (2026) içinde alınacak ve aşağıdaki kritik alanlara tahsis edilecektir. Sonraki yıllardaki büyüme ve operasyonel giderler, aplikasyon gelirleri ve ek yatırım turlarıyla finanse edilecektir.</p>
            <ul className="list-disc list-inside text-gray-700 space-y-2">
              <li><strong>Platform Geliştirme ve Başlangıç Operasyonları:</strong> %40 (Yaklaşık $400.000)</li>
              <li><strong>İlk Yıl Pazarlama ve Kullanıcı Kazanımı:</strong> %35 (Yaklaşık $350.000)</li>
              <li><strong>İnovasyon ve İlk Aşama Gelişimi:</strong> %25 (Yaklaşık $250.000)</li>
            </ul>
          </div>
        </div>
      </section>

      {/* Why Invest */}
      <section id="neden_yatirim" className="py-12 bg-gradient-to-r from-[#FF9F1C] to-[#FFC43D] text-white rounded-2xl shadow-xl">
        <h3 className="text-3xl font-bold section-header text-white text-center">Neden Nefes21'e Yatırım Yapmalısınız?</h3>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-center">
          <div className="bg-white p-6 rounded-xl shadow-lg text-[#333333]">
            <div className="text-4xl mb-2">✅</div>
            <p className="font-bold text-lg">Kanıtlanmış Başarı</p>
            <p className="text-sm text-gray-600">Geçmiş ödüller ve kullanıcı memnuniyeti.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg text-[#333333]">
            <div className="text-4xl mb-2">🌍</div>
            <p className="font-bold text-lg">Geniş Küresel Pazar</p>
            <p className="text-sm text-gray-600">Sürekli büyüyen wellness endüstrisi.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg text-[#333333]">
            <div className="text-4xl mb-2">🔗</div>
            <p className="font-bold text-lg">Benzersiz Entegrasyon</p>
            <p className="text-sm text-gray-600">Tek ve güçlü platform modeli.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg text-[#333333]">
            <div className="text-4xl mb-2">🚀</div>
            <p className="font-bold text-lg">İnovasyon Liderliği</p>
            <p className="text-sm text-gray-600">AI, VR/AR gibi gelecek teknolojileri.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg text-[#333333]">
            <div className="text-4xl mb-2">📈</div>
            <p className="font-bold text-lg">Yüksek Getiri Potansiyeli</p>
            <p className="text-sm text-gray-600">Agresif büyüme ve sağlam finansal projeksiyonlar.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg text-[#333333]">
            <div className="text-4xl mb-2">❤️</div>
            <p className="font-bold text-lg">Güçlü Sosyal Etki</p>
            <p className="text-sm text-gray-600">Milyonlarca insanın yaşam kalitesini artırma.</p>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-[#333333] text-white py-12">
        <div className="container mx-auto text-center px-6">
          <h3 className="text-3xl font-bold mb-4">Geleceği Birlikte İnşa Edelim</h3>
          <p className="max-w-3xl mx-auto text-gray-300 mb-8">
            Nefes21'e yapacağınız yatırım, sadece finansal bir getiri sağlamakla kalmayacak, aynı zamanda milyonlarca insanın yaşamına dokunarak olumlu bir sosyal etki yaratma fırsatı sunacaktır.
          </p>
          <a href="mailto:bulent@nefes21.com" className="inline-block bg-[#FF6B35] text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
            Yatırımcı İlişkileri ile İletişime Geçin
          </a>
          <div className="mt-10 text-sm text-gray-400">
            <p>Web Sitelerimiz: Nefes21.com | Nefes21.academy | Kisiselgelisim.tv | Bulentgardiyanoglu.com</p>
            <p className="mt-2">E-posta: bulent@nefes21.com | Telefon: +90 548 8620090 (WhatsApp)</p>
            <p className="mt-2">&copy; 2025 Nefes21. Tüm hakları saklıdır.</p>
          </div>
        </div>
      </footer>
    </div>
  );
};

export default App;