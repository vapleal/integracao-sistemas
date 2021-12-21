using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace integra_gg
{
    class Program
    {
        static void Main(string[] args)
        {
            SoftHouse sh = new SoftHouse();

            if (sh._Insert())
            {
                Console.WriteLine("Integração realizada!");
            }
            else
            {
                Console.WriteLine("Erro ao integrar" + AcessoBD.erroBD);
            }
            Console.ReadKey();
        }
    }
}
