using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace integra_gg
{
    class AcessoBD
    {
        #region Campos da Classe
        private static string varConexao = @"Data Source=(LocalDB)\MSSQLLocalDB;AttachDbFilename=C:\Dados\DBGoodGames.mdf;Integrated Security=True;Connect Timeout=30";
            
        public static DataTable dataTable = new DataTable();
        public static string erroBD = "";
        #endregion

        #region Metodos da classe
        public static Boolean Consultar(string varSQL, List<SqlParameter> lista)
        {
            // conexão com o banco de dados
            SqlConnection con = new SqlConnection(AcessoBD.varConexao);
            // Envia a instrução SQL e a Conexão para o banco
            SqlDataAdapter dataAdapter = new SqlDataAdapter(varSQL, con);
            dataAdapter.SelectCommand.Parameters.Clear();
            dataAdapter.SelectCommand.Parameters.AddRange
                (lista.ToArray<SqlParameter>());
            // abre a conexão com o banco
            con.Open();
            // limpa a lista de dados
            dataTable.Clear();
            dataTable.Rows.Clear();
            dataTable.Columns.Clear();
            // preenche a lista de dados
            dataAdapter.Fill(dataTable);
            // verifica se o usuário foi encontrado
            if (dataTable.Rows.Count == 0)
            {
                return false;
            }
            else
            {
                return true;
            }   
        }

        /*
            Método para manipular dados 
        */
        public static Boolean Manter(string SQL, List<SqlParameter> lista)
        {
            // tenta fazer conexão e inserir a intrução sql
            try
            {
                // cria conexão com o banco
                SqlConnection conexao = new SqlConnection(AcessoBD.varConexao);
                // cria instrução sql para o comando solicitado
                SqlCommand comandoSQL = new SqlCommand(SQL, conexao);
                // limpa a lista de parametros e adiciona os comandos enviados
                comandoSQL.Parameters.Clear();
                comandoSQL.Parameters.AddRange(lista.ToArray<SqlParameter>());
                // abre uma conexão com o banco
                conexao.Open();
                // executa os comandos sql enviados para o método
                comandoSQL.ExecuteNonQuery();
                // fecha conexão com o banco
                conexao.Close();
                // retorna verdadeiro se ocorrer tudo certo
                return true;
            }
            // captura erros que aconteceram na tentativa (try)
            catch(Exception e)
            {
                // captura erro e insere na variável de erro
                erroBD = e.Message;
                // retorna falso
                return false;
            }
        }
        /*
             Método para listar tabelas
        */
        public static DataTable Listar(string varSQL)
        {
            SqlConnection con = new SqlConnection(AcessoBD.varConexao);
            SqlDataAdapter adapter = new SqlDataAdapter(varSQL, con);
            
            con.Open();
            // objeto do tipo tabela que recebe os valores
            // da tabela do banco de dados
            dataTable.Clear();
            dataTable.Rows.Clear();
            dataTable.Columns.Clear();
            // preencher os valores recebidos
            adapter.Fill(dataTable);
            con.Close();
            return dataTable;
        }

        #endregion

    }
}
