🏠 AuraHome Projesi Nedir?
AuraHome; modern web teknolojileriyle geliştirilmiş, içerisinde gelişmiş sepet mantığı, merkezi dijital cüzdan (bakiye/iade) yönetimi, üçüncü parti API entegrasyonları (hava durumu) ve interaktif harita bilesenleri barındıran kapsamlı bir e-ticaret ve yönetim platformudur. Proje, hem son kullanıcı (müşteri) deneyimini hem de arka plan (admin) yönetim süreçlerini uçtan uca simüle etmek amacıyla tasarlanmıştır.

🎯 Projenin Amacı ve Çözdüğü Problemler
Dinamik Alışveriş Deneyimi: Klasik e-ticaret sistemlerinin ötesine geçerek, kullanıcıya anlık hava durumu ve konum tabanlı interaktif harita desteği sunmak.

Güvenli ve Esnek Ödeme Modeli: Geleneksel ödeme yöntemlerine alternatif olarak, kullanıcıların sistem içinde bakiye yükleyip harcayabileceği, sipariş iptallerinde anında geri iade alabileceği kapalı devre bir cüzdan (wallet) mekanizması kurmak.

Kapsamlı İdari Kontrol: Admin panelinden müşterilerin aktiflik durumlarını, sipariş geçmişlerini ve sistem akışını anlık olarak izleyip yönetebilecek tek bir yönetim merkezi oluşturmak.

⚡ Temel Özellikler (Core Features)
Gelişmiş Rol ve Yetkilendirme: Müşteri ve Admin rollerinin güvenli rotalarla (middleware) birbirinden tamamen ayrılması.

Oturum Tabanlı Sepet Yönetimi: Session mimarisi kullanılarak optimize edilmiş, ürün ekleme, çıkarma ve bakiye kontrolü yapan sepet sistemi.

Merkezi Cüzdan & İade Akışı: Sipariş verildiğinde bakiyeden düşen, sipariş iptal edildiğinde ise kuruşu kuruşuna cüzdana geri yüklenen dinamik iade algoritması.

Dış Servis Entegrasyonları: Canlı hava durumu verilerini işleyen harici API mimarisi ve Leaflet.js tabanlı harita görünümü.

Yönetici Kontrol Ağı: Kullanıcı dondurma, aktif etme, sipariş durumlarını güncelleme yetkilerine sahip tam fonksiyonel admin paneli.

📸 Proje Ekran Görüntüleri


Anasayfa & Ürün Listesi:

<img width="1899" height="872" alt="image" src="https://github.com/user-attachments/assets/53497282-11a9-4fc6-acbd-02efbec4f539" />

Cüzdan & Bakiye Düzenleme Paneli:

<img width="1917" height="882" alt="Ekran görüntüsü 2026-05-26 172956" src="https://github.com/user-attachments/assets/735c5a92-9d52-4d29-8e05-d539a48ff586" />

Ödeme/Satın Alma Sayfası:

<img width="1886" height="884" alt="Ekran görüntüsü 2026-05-26 173240" src="https://github.com/user-attachments/assets/68a16c9c-62b1-4ea0-a730-d0a887ba1e0c" />


Admin Ürün Envanter ve Tedarik Ekranı:

<img width="1909" height="884" alt="Ekran görüntüsü 2026-05-26 173123" src="https://github.com/user-attachments/assets/a320c9f1-e7a1-4ee4-8552-b633aeee10f0" />

Admin Kullanıcı Yönetimi ve Hesap Dondurma:

<img width="1919" height="890" alt="Ekran görüntüsü 2026-05-26 173253" src="https://github.com/user-attachments/assets/3aa2258f-1df6-432e-851f-6bf12b92f5fe" />

Open-Meteo API Hava Durumu ve Leaflet Haritası:

<img width="1900" height="880" alt="Ekran görüntüsü 2026-05-26 181110" src="https://github.com/user-attachments/assets/341a417c-8f9d-48b1-b5f9-8aa5ad4cd0c7" />


## 🛠️ Kullanılan Teknolojiler ve Sistem Mimarisi

Projenin geliştirilmesinde, modern yazılım mühendisliği standartlarına uygun, sürdürülebilir ve performanslı araçlar tercih edilmiştir.

### 1. Arka Plan (Backend) Teknolojileri
* **PHP:** Projenin çekirdek programlama dili. Nesne yönelimli mimarisi (OOP) ve dinamik yapısı kullanılmıştır.
* **Laravel Framework:** Backend mimarisinin omurgasını oluşturur. Güvenli rotalama (Routing), veri tabanı yönetim kolaylığı (Eloquent ORM) ve hazır kimlik doğrulama mekanizmaları (Authentication) için tercih edilmiştir.

### 2. Ön Yüz (Frontend) Teknolojileri
* **Blade Template Engine:** Laravel'in yerleşik şablon motorudur. HTML içerisine backend verilerini güvenli, hızlı ve modüler bir şekilde enjekte etmek için kullanılmıştır.
* **TailwindCSS:** Modern, utility-first (bileşen odaklı) CSS kütüphanesi. Arayüzün responsive (mobil ve tablet uyumlu), temiz ve kullanıcı dostu olmasını sağlamak için kullanılmıştır.

### 3. Veri Yönetimi ve Servisler
* **Veritabanı Yönetimi (Eloquent ORM):** SQL sorgularını elle yazmak yerine, nesne tabanlı ve güvenli sorgular oluşturan Eloquent mimarisi kullanılmıştır. Bu sayede SQL Injection gibi temel siber güvenlik açıklarının önüne geçilmiştir.
* **Session (Oturum) Yönetimi:** Sepet verilerinin kullanıcı giriş yapmasa dahi geçici olarak tarayıcı ve sunucu arasında güvenle saklanması için Laravel Session mimarisi aktif olarak kullanılmıştır.
* **Harici API (Open-Meteo):** Sistem genelinde konum tabanlı, anlık hava durumu verilerini JSON formatında çekmek ve işlemek için entegre edilmiştir.
* **Leaflet.js:** Ön yüzde interaktif harita bileşenini oluşturmak ve konum işaretçilerini (Marker) dinamik olarak işlemek için kullanılan açık kaynaklı JavaScript kütüphanesidir.

### 📐 Mimari Yapı: MVC (Model-View-Controller)
Proje, yazılım dünyasında kabul görmüş **MVC** tasarım kalıbına sıkı sıkıya bağlı kalınarak geliştirilmiştir:
1.  **Model (Veri katmanı):** Veritabanındaki tabloları temsil eder (`User`, `Product`, `Order`, `Category`). İş mantığı ve veritabanı ilişkileri burada tanımlıdır.
2.  **View (Sunum katmanı):** Kullanıcının gördüğü Blade şablonlarıdır. Kontrolcüden gelen verileri ekrana basar.
3.  **Controller (Kontrol katmanı):** Model ve View arasındaki köprüdür. Kullanıcıdan gelen istekleri (Request) alır, işler, veritabanı işlemlerini yürütür ve sonucu View katmanına gönderir.

## 🗄️ Veritabanı Yapısı ve İlişkileri (Database Schema)

Projenin veritabanı, veri tekrarını önlemek (Normalizasyon) ve veri bütünlüğünü sağlamak amacıyla ilişkisel veritabanı standartlarına uygun olarak tasarlanmıştır. Temel tablolar ve işlevleri şunlardır:
### 📊 Veritabanı Şeması (ER Diagram)

erDiagram
    USERS ||--o{ ORDERS : "verir"
    CATEGORIES ||--o{ PRODUCTS : "içerir"
    
    USERS {
        int id PK
        string name
        string email
        decimal balance
        string role
        string is_active
    }
    CATEGORIES {
        int id PK
        string name
        string slug
    }
    PRODUCTS {
        int id PK
        int category_id FK
        string name
        decimal price
        int stock
    }
    ORDERS {
        int id PK
        int user_id FK
        decimal total_price
        string status
    }

### 1. `users` (Kullanıcılar Tablosu)
* **İşlevi:** Müşteri ve yönetici bilgilerini tutar.
* **Önemli Sütunlar:** `id`, `name`, `email`, `password`, `role` (Admin/Müşteri ayrımı için), `balance` (Kullanıcının cüzdan bakiyesi), `is_active` (Adminin kullanıcıyı dondurabilmesi için statü).

### 2. `categories` (Kategoriler Tablosu)
* **İşlevi:** Ürünlerin sınıflandırıldığı ve ana sayfada listelendiği temel tablodur.
* **Önemli Sütunlar:** `id`, `name`, `slug` (SEO uyumlu URL yapısı oluşturmak için).

### 3. `products` (Ürünler Tablosu)
* **İşlevi:** Sistemde satılan ürünlerin fiyat, stok ve görsel detaylarını barındırır.
* **Önemli Sütunlar:** `id`, `category_id` (Yabancı anahtar/Foreign Key), `name`, `description`, `price`, `stock`, `image`.

### 4. `orders` (Siparişler Tablosu)
* **İşlevi:** Satın alınan ürünlerin ve sepet tutarının kalıcı olarak işlendiği tablodur. İade ve iptal işlemleri bu tablo üzerinden takip edilir.
* **Önemli Sütunlar:** `id`, `user_id` (Yabancı anahtar), `total_price`, `status` (Bekliyor, Tamamlandı, İptal Edildi).

### 🔗 Tablolar Arası İlişkiler (Eloquent Relationships)
Laravel'in Eloquent ORM yapısı kullanılarak tablolar birbirine bağlanmıştır:
* **One-to-Many (Bire-Çok):** Bir kategorinin birden fazla ürünü olabilir. (`Category -> hasMany -> Product`)
* **One-to-Many (Bire-Çok):** Bir kullanıcının birden fazla siparişi olabilir. (`User -> hasMany -> Order`)
* **BelongsTo (Ait Olma):** Sisteme eklenen her ürün zorunlu olarak tek bir kategoriye aittir. Her sipariş de benzersiz bir kullanıcıya aittir.

## ⚙️ Temel Modüller ve Teknik Detaylar

AuraHome, standart CRUD (Ekle/Oku/Güncelle/Sil) işlemlerinin ötesinde özel algoritmalar ve dış servis entegrasyonları barındırır:

### 1. Kapalı Devre Cüzdan (Wallet) ve İade Algoritması
Kullanıcıların harici bir ödeme geçidine (Örn: Stripe/Iyzico) ihtiyaç duymadan alışveriş yapabilmesi için sistem içi bir bakiye (`balance`) mantığı kurulmuştur.
* **Ödeme Akışı:** Kullanıcı sipariş verdiğinde, sepet tutarı anlık olarak kullanıcının bakiyesinden düşülür (`$user->decrement('balance', $total)`). Bakiye yetersizse sistem siparişi reddeder.
* **İade Akışı:** Admin, panel üzerinden bir siparişi "İptal Edildi" statüsüne çektiğinde, veritabanı dinlenir ve sipariş tutarı anında kullanıcının cüzdanına iade edilir (`$user->increment('balance', $total)`).

### 2. Harici API Entegrasyonu (Hava Durumu)
Uygulamaya dinamik bir hava katmak için **Open-Meteo API** kullanılmıştır.
* Laravel'in yerleşik `Http` fadası kullanılarak dış sunucuya GET isteği atılır.
* Gelen JSON verisi backend'de işlenir ve Blade şablonlarına aktarılarak ön yüzde anlık hava durumu kartları oluşturulur.
* Bu veriler sürekli değiştiği için veritabanına kaydedilmez, anlık (real-time) olarak çekilip gösterilir.

### 3. İnteraktif Harita Entegrasyonu (Leaflet.js)
Kullanıcılara görsel bir deneyim sunmak için açık kaynaklı **Leaflet.js** kütüphanesi projeye dahil edilmiştir. Uygulama içerisindeki iletişim/konum bölümleri statik bir resim yerine, kullanıcının etkileşime girebileceği (zoom, kaydırma) dinamik bir JavaScript haritası üzerinden sunulmaktadır.

### 4. Admin Paneli ve Middleware (Ara Katman) Güvenliği
Yönetim paneline yetkisiz erişimleri engellemek için Laravel **Middleware** yapısı kullanılmıştır.
* Sistem, giriş yapan kullanıcının `role` sütununu kontrol eder.
* Eğer rol "admin" değilse, kullanıcı admin rotalarına girmeye çalıştığında sistem otomatik olarak anlık yetki hatası (403) verir veya anasayfaya yönlendirir.
* Admin panelinden kullanıcıların "Aktif/Pasif" (is_active) durumları değiştirilerek hesapları dondurulabilmektedir.

## 🚀 Kurulum ve Çalıştırma Talimatları

Bu projeyi yerel ortamınızda (localhost) çalıştırmak için aşağıdaki adımları sırasıyla uygulayınız:

### Ön Gereksinimler
* PHP (v8.2 veya üzeri)
* Composer
* Node.js ve NPM
* MySQL (XAMPP/Laragon vb.)

### Adım Adım Kurulum

1. **Projeyi Klonlayın:**
   ```bash
   git clone [https://github.com/ulascanndmrc/aurahome-project.git](https://github.com/ulascanndmrc/aurahome-project.git)
   cd aurahome-project
Bağımlılıkları Yükleyin:

Bash
composer install
npm install
Çevre Değişkenlerini Ayarlayın:

.env.example dosyasının adını .env olarak değiştirin.

.env dosyası içerisindeki veritabanı ayarlarını kendi yerel MySQL bağlantınıza göre düzenleyin (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

Uygulama Anahtarını Oluşturun:

Bash
php artisan key:generate
Veritabanını Oluşturun ve Sahte Verileri (Seeder) Yükleyin:

Bash
php artisan migrate --seed
Ön Yüz (Frontend) Dosyalarını Derleyin:

Bash
npm run build
Sunucuyu Başlatın:

Bash
php artisan serve

Uygulama artık http://localhost:8000 adresinde çalışmaktadır.
