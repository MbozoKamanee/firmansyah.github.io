
import Header from "@/components/Header";
import { Card, CardContent } from "@/components/ui/card";

const sejarahItems = [
  {
    title: "Kesultanan Bima",
    content: "Sejarah Kesultanan Bima yang berdiri pada abad ke-17 dan memiliki peran penting dalam penyebaran Islam di wilayah timur Nusantara.",
    image: "https://images.unsplash.com/photo-1466442929976-97f336a657be"
  },
  {
    title: "Uma Lengge",
    content: "Rumah adat tradisional Bima yang memiliki arsitektur unik dan filosofi mendalam tentang kehidupan masyarakat Bima.",
    image: "https://images.unsplash.com/photo-1493962853295-0fd70327578a"
  }
];

const Sejarah = () => {
  return (
    <div className="min-h-screen bg-gradient-to-b from-gray-50 to-blue-50">
      <Header />
      <main className="container mx-auto px-4 py-12">
        <h1 className="text-3xl font-bold mb-8 text-center bg-clip-text text-transparent bg-gradient-to-r from-blue-900 to-indigo-900">
          Sejarah Bima
        </h1>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {sejarahItems.map((item, index) => (
            <Card key={index} className="overflow-hidden transform hover:scale-105 transition-transform duration-300 shadow-lg border-0 bg-white/80 backdrop-blur-sm">
              <div className="aspect-video relative overflow-hidden">
                <img 
                  src={item.image} 
                  alt={item.title} 
                  className="w-full h-full object-cover hover:scale-110 transition-transform duration-500"
                />
              </div>
              <CardContent className="p-6">
                <h2 className="text-xl font-bold text-blue-900 mb-4">{item.title}</h2>
                <p className="text-gray-600">{item.content}</p>
              </CardContent>
            </Card>
          ))}
        </div>
      </main>
      <footer className="bg-gradient-to-r from-blue-900 to-indigo-900 text-white py-8">
        <div className="container mx-auto px-4 text-center">
          <p className="text-white/90">© 2024 MBOZOKAMANE. Hak Cipta Dilindungi.</p>
        </div>
      </footer>
    </div>
  );
};

export default Sejarah;
