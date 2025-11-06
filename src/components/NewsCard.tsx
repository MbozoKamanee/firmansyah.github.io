
import { Card, CardContent, CardFooter, CardHeader } from "@/components/ui/card";
import { Calendar } from "lucide-react";

interface NewsCardProps {
  title: string;
  excerpt: string;
  image: string;
  date: string;
  category: string;
}

const NewsCard = ({ title, excerpt, image, date, category }: NewsCardProps) => {
  return (
    <Card className="overflow-hidden hover:shadow-lg transition-shadow">
      <div className="aspect-video relative overflow-hidden">
        <img 
          src={image} 
          alt={title}
          className="object-cover w-full h-full hover:scale-105 transition-transform duration-300"
        />
      </div>
      <CardHeader>
        <div className="flex justify-between items-center mb-2">
          <span className="text-sm font-medium text-blue-900">{category}</span>
          <div className="flex items-center text-gray-500 text-sm">
            <Calendar className="h-4 w-4 mr-1" />
            {date}
          </div>
        </div>
        <h3 className="font-semibold text-lg line-clamp-2 hover:text-blue-900 cursor-pointer">
          {title}
        </h3>
      </CardHeader>
      <CardContent>
        <p className="text-gray-600 line-clamp-3">{excerpt}</p>
      </CardContent>
      <CardFooter>
        <button className="text-blue-900 hover:text-blue-700 text-sm font-medium">
          Baca Selengkapnya →
        </button>
      </CardFooter>
    </Card>
  );
};

export default NewsCard;
