
import Header from "@/components/Header";
import { Card, CardContent } from "@/components/ui/card";

const wisataItems = [
  {
    title: "Pantai Lariti",
    content: "Pantai dengan pasir putih dan ombak yang cocok untuk berselancar, menjadi destinasi favorit wisatawan lokal dan mancanegara.",
    image: "https://images.unsplash.com/photo-1472396961693-142e6e269027"
  },
  {
    title: "Gunung Tambora",
    content: "Gunung bersejarah dengan pemandangan alam yang memukau, menjadi destinasi untuk pendakian dan penelitian.",
    image: "https://images.unsplash.com/photo-1482938289607-e9573fc25ebb"
  }
];

const Pariwisata = () => {
  return (
    <div className="min-h-screen bg-gradient-to-b from-gray-50 to-blue-50">
      <Header />
      <main className="container mx-auto px-4 py-12">
        <h1 className="text-3xl font-bold mb-8 text-center bg-clip-text text-transparent bg-gradient-to-r from-blue-900 to-indigo-900">
          Pariwisata Bima
        </h1>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {wisataItems.map((item, index) => (
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

export default Pariwisata;
