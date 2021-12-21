using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;

namespace integra_gg
{
    class SoftHouse
    {
        #region Versão
        /*
            Classe que faz a manipulação dos dados para integração de Soft House
            Data de criação: 23/09/2019
            Autor: Vanderlei
            Utilização: Sistema para aula de C#, PHP, Teste de Software
            Alterações:
                    
        */
        #endregion

        #region Campos classe usuário
        /*
        São as variaveis que serão usadas 
        pela classe e pelo formulário 
        */
        private int codigo;
        private string descricao;

        private string diretorio = @"C:\integra_gg\Integra\";
        private string URL = @"ftp://localhost/integra/";
        private string userFTP = "integra";
        private string passFTP = "123";

        private string ins_SH = "sh_insert.txt";

        /*
        Uma lista de valores: pode ser de qualquer conjunto
        de valores.
        De string (palavras), de int ou double (números),
        de valores específicos (comandos do sistema ou classes)
        */
        public static List<SqlParameter> ListaParametros = 
                                        new List<SqlParameter>();
        // uma região serve para organizar o código
        // assim podemos "esconder" um código para deixar
        // apenas o que estamos editando
        #endregion

        #region Acessores da classe
        /*
          São usados para atribuir e retornar os valores
          dos campos da classe (variáveis) 
        */
        public int Codigo
        {
            get { return codigo; }
            set { codigo = value; }
        }
        public string Descricao
        {
            get { return descricao; }
            set { descricao = value; }
        }

        #endregion

        #region Métodos da classe
        /*
          Comportamentos que classe tem.
          São funções e processos que podem ser executados pelo
          sistema utilizando os campos da classe   
        */
        /*
         Método que consulta o banco e retorna se o usuário do sistema
         existe 
        */
        public Boolean _Insert()
        {
            List<SoftHouse> sh = new List<SoftHouse>();
            Boolean r = false;

            string linha;
            string[] coluna;
            WebClient wc = new WebClient();
            
            try
            {
                wc.Credentials = new NetworkCredential(userFTP, passFTP);
                wc.DownloadFile(URL + ins_SH, diretorio + ins_SH);

                StreamReader ler = new StreamReader(diretorio + ins_SH);
                while (!ler.EndOfStream)
                {
                    linha = ler.ReadLine();
                    //coluna = linha.Split('|');
                    /*
                    sh.Add(new SoftHouse()
                    {
                        Descricao = linha.ToString(),
                    });*/
                    string varSql =
                    "INSERT INTO tb_softhouse (descsh)" +
                    "VALUES (@1)";
                    ListaParametros.Clear();
                    ListaParametros.Add(new SqlParameter("@1", linha.ToString()));

                    r = AcessoBD.Manter(varSql, ListaParametros);
                }
                ler.Close(); // fecha arquivo de texto
                FtpWebRequest delArq = (FtpWebRequest)WebRequest.Create(URL + ins_SH);
                delArq.Method = WebRequestMethods.Ftp.DeleteFile;
                delArq.Credentials = new NetworkCredential(userFTP, passFTP);

                File.Delete(diretorio + ins_SH);
                return r;
            }
            catch (Exception e)
            {
                Console.WriteLine(e);
                return r;
            }
        }
        public Boolean Consulta(SoftHouse sh)
        {
            string varSql = 
            "SELECT * FROM tb_usuario WHERE loginusu = @1 AND senhausu = @2";
            ListaParametros.Clear();
            ListaParametros.Add(new SqlParameter("@1", sh.Descricao));
            
            return AcessoBD.Consultar(varSql, ListaParametros);
        }
       /*
          Método para alterar um dado
        */
        public Boolean Alterar(SoftHouse sh)
        {
            string varSql = "UPDATE tb_softhouse SET" + 
                     " descsh = @2" + 
                     " WHERE idsh = @1";
            ListaParametros.Clear();
            ListaParametros.Add(new SqlParameter("@1", sh.Codigo));
            ListaParametros.Add(new SqlParameter("@2", sh.Descricao));
            return AcessoBD.Manter(varSql, ListaParametros);
        }
        /*
          Método para excluir 
        */
        public Boolean Excluir(SoftHouse sh)
        {
            string varSql = "DELETE FROM tb_softhouse WHERE idsh = @1";
            ListaParametros.Clear();
            ListaParametros.Add(new SqlParameter("@1", sh.Codigo));

            return AcessoBD.Manter(varSql, ListaParametros);
        }
        /*
         Método para listar  
        */
        public static DataTable Lista()
        {
            string varSql =
            "SELECT * FROM tb_softhouse";
            return AcessoBD.Listar(varSql);
        }
        
        #endregion

    }
}
