using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;
using System.Data;

namespace BaiThucHanhCau1
{
    class BaiTap1
    {
        static void Main(string[] args)
        {
            Console.OutputEncoding = Encoding.UTF8;
            /*Bước 1. Connect String */
            var conString = @"Data Source=MSI\SQLEXPRESS; Initial Catalog = northwnd; Integrated Security=True";
            /*Bước 2. Tạo Đối tượng SqlConnecttion */

            //Câu 14
            using (SqlConnection connection = new SqlConnection(conString))
            {
                Console.WriteLine("14. Đếm số product của từng supplier");
                connection.Open();
                var query = @"select CompanyName,COUNT(p.SupplierID) as QuantityPro 
                              from Products p 
                              join Suppliers s on p.SupplierID=s.SupplierID 
                              group by p.SupplierID,CompanyName;";
                var command = new SqlCommand(query, connection);
                var count = command.ExecuteReader(CommandBehavior.CloseConnection);
                if (count.HasRows)
                {
                    while (count.Read())
                    {
                        var CompanyName = count.GetString("CompanyName");
                        var QuantityPro = count.GetInt32("QuantityPro");
                        Console.WriteLine($"CompanyName: {CompanyName}");
                        Console.WriteLine($"QuantityPro: {QuantityPro}");
                        Console.WriteLine("------------------------------------------------------------");
                    }
                }
            }



            //Câu 1
            //using (SqlConnection connection = new SqlConnection(conString))
            //{
            //    Console.WriteLine("1. Update price");
            //    connection.Open();
            //    var updatestring = @"update Products set UnitsInStock = 20 where UnitsInStock=0;";
            //    var command = new SqlCommand(updatestring, connection);
            //    var count = command.ExecuteNonQuery();
            //    Console.WriteLine($"Số dòng được sửa: {count}");
            //}

            //Câu 2
            //using (SqlConnection connection = new SqlConnection(conString))
            //{
            //    Console.WriteLine("2. Tăng UnitPrice");
            //    connection.Open();
            //    var updatestring = @"update [Order Details] set UnitPrice = UnitPrice*1.1 where Quantity >20;";
            //    var command = new SqlCommand(updatestring, connection);
            //    var count = command.ExecuteNonQuery();
            //    Console.WriteLine("Số dòng được sửa:" + count);
            //}

            //Câu 3
            //using (SqlConnection connection = new SqlConnection(conString))
            //{
            //    Console.WriteLine("3. Liệt kê các ProductName bắt đầu bằng chữ G");
            //    connection.Open();
            //    var querytring = @"select ProductName from Products where ProductName like 'G%';";
            //    var command = new SqlCommand(querytring, connection);
            //    var reader = command.ExecuteReader(CommandBehavior.CloseConnection);
            //    if(reader.HasRows)
            //    {
            //        while(reader.Read())
            //        {
            //            var ProductName = reader.GetString("ProductName");
            //            Console.WriteLine("các ProductName bắt đầu bằng chữ G: " + ProductName);
            //        }
            //    }
            //}

            //Câu 4
            //using (SqlConnection connection = new SqlConnection(conString))
            //{
            //    Console.WriteLine("4. Liệt kê các Product (ProductName) do CompanyName “Tokyo Traders” cung cấp");
            //    connection.Open();
            //    var querytring = @"select ProductName from Products p join Suppliers s on p.SupplierID=s.SupplierID where CompanyName='Tokyo Traders';";
            //    var command = new SqlCommand(querytring, connection);
            //    var reader = command.ExecuteReader(CommandBehavior.CloseConnection);
            //    if (reader.HasRows)
            //    {
            //        while (reader.Read())
            //        {
            //            var ProductName = reader.GetString("ProductName");
            //            Console.WriteLine("ProductName: " + ProductName);
            //        }
            //    }
            //}

            //Câu 19
            //using (SqlConnection connection = new SqlConnection(conString))
            //{
            //    Console.WriteLine("19. Tìm employee chưa lập order nào");
            //    connection.Open();
            //    var query = @"select * from Employees
            //                  select EmployeeID, FirstName,LastName 
            //                  from Employees where EmployeeID 
            //                  not in (select EmployeeID from Orders )";
            //    var command = new SqlCommand(query, connection);
            //    var count = command.ExecuteReader(CommandBehavior.CloseConnection);
            //    if (count.HasRows)
            //    {
            //        while (count.Read())
            //        {
            //            var EmployeeID = count.GetInt32("EmployeeID");
            //            var LastName = count.GetString("LastName");
            //            var FirstName = count.GetString("FirstName");
            //            Console.WriteLine($"CompanyName: {EmployeeID}");
            //            Console.WriteLine($"QuantityPro: {LastName}");
            //            Console.WriteLine($"QuantityPro: {FirstName}");
            //            Console.WriteLine("------------------------------------------------------------");
            //        }
            //    }
            //}

            //Câu 20
//            using (SqlConnection connection = new SqlConnection(conString))
//            {
//                Console.WriteLine("14. Đếm số product của từng supplier");
//                connection.Open();
//                var query = @"select p.ProductName,SUM(od.Quantity) from Products p join [Order Details] od on p.ProductID=od.ProductID
//group by od.ProductID, p.ProductName";
//                var command = new SqlCommand(query, connection);
//                var count = command.ExecuteReader(CommandBehavior.CloseConnection);
//                if (count.HasRows)
//                {
//                    while (count.Read())
//                    {
//                        var CompanyName = count.GetString("CompanyName");
//                        var QuantityPro = count.GetInt32("QuantityPro");
//                        Console.WriteLine($"CompanyName: {CompanyName}");
//                        Console.WriteLine($"QuantityPro: {QuantityPro}");
//                        Console.WriteLine("------------------------------------------------------------");
//                    }
//                }
//            }

        }
    }
}
