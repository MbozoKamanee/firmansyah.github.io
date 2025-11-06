
import Header from "@/components/Header";
import { Card, CardContent } from "@/components/ui/card";

const heroImages = [
  {
    title: "Bupati Bima",
    image: "https://images.unsplash.com/photo-1466442929976-97f336a657be",
    description: "Bupati Bima saat ini"
  },
  {
    title: "Rimpu Bima",
    image: "https://images.unsplash.com/photo-1472396961693-142e6e269027",
    description: "Rimpu: Pakaian adat wanita Bima yang mencerminkan identitas dan nilai-nilai budaya"
  },
  {
    title: "Nelayan Bima",
    image: "https://images.unsplash.com/photo-1493962853295-0fd70327578a",
    description: "Kehidupan nelayan di pesisir Bima"
  },
  {
    title: "Petani Bima",
    image: "https://images.unsplash.com/photo-1482938289607-e9573fc25ebb",
    description: "Aktivitas petani di lahan pertanian Bima"
  }
];

const Index = () => {
  return (
    <div className="min-h-screen bg-gradient-to-b from-gray-50 to-blue-50">
      <Header />
      <main className="container mx-auto px-4 py-12">
        <section className="mb-12">
          <h2 className="text-3xl font-bold text-blue-900 mb-8 text-center bg-clip-text text-transparent bg-gradient-to-r from-blue-900 to-indigo-900">
            Selamat Datang di MBOZOKAMANE
          </h2>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {heroImages.map((item, index) => (
              <Card key={index} className="overflow-hidden transform hover:scale-105 transition-transform duration-300 shadow-lg border-0 bg-white/80 backdrop-blur-sm">
                <div className="aspect-video relative overflow-hidden">
                  <img 
                    src={item.image} 
                    alt={item.title}
                    className="object-cover w-full h-full hover:scale-110 transition-transform duration-500"
                  />
                </div>
                <CardContent className="p-4">
                  <h3 className="font-semibold text-lg mb-2 text-blue-900">{item.title}</h3>
                  <p className="text-gray-600 text-sm">{item.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </section>
      </main>
      <footer className="bg-gradient-to-r from-blue-900 to-indigo-900 text-white py-8 relative">
        <div className="container mx-auto px-4 text-center">
          <p className="text-white/90">© 2024 MBOZOKAMANE. Hak Cipta Dilindungi.</p>
        </div>
        <div className="fixed bottom-4 right-4 z-50">
          <iframe 
            src="https://bot.dialogflow.com/1d340160-d68d-473f-9818-48d901f2adee"
            width="350"
            height="430"
            style={{ border: '0' }}
            allow="microphone;"
            className="rounded-lg shadow-xl border-2 border-blue-900/20 bg-white"
          ></iframe>
        </div>
      </footer>
    </div>
  );
};

export default Index;
