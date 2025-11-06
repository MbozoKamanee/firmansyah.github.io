
import { FileText, Bell, Search } from "lucide-react";
import { Button } from "@/components/ui/button";

const Header = () => {
  return (
    <header className="sticky top-0 z-50 w-full border-b bg-gradient-to-r from-blue-900 to-indigo-900 shadow-lg">
      <div className="container mx-auto px-4 h-16 flex items-center justify-between">
        <div className="flex items-center space-x-2">
          <FileText className="h-6 w-6 text-white" />
          <h1 className="text-xl font-bold text-white hover:text-blue-200 transition-colors">MBOZOKAMANE</h1>
        </div>
        
        <nav className="hidden md:flex space-x-6">
          <a href="/" className="text-white hover:text-blue-200 transition-colors">Beranda</a>
          <a href="/sejarah" className="text-white hover:text-blue-200 transition-colors">Sejarah</a>
          <a href="/pariwisata" className="text-white hover:text-blue-200 transition-colors">Pariwisata</a>
        </nav>

        <div className="flex items-center space-x-4">
          <Button variant="ghost" size="icon" className="text-white hover:text-blue-200">
            <Search className="h-5 w-5" />
          </Button>
          <Button variant="ghost" size="icon" className="text-white hover:text-blue-200">
            <Bell className="h-5 w-5" />
          </Button>
        </div>
      </div>
    </header>
  );
};

export default Header;
