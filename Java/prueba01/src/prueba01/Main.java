package prueba01;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class Main {
    public static void main(String[] args) {
        
    	String url = "jdbc:mysql://localhost:3306/codi";
    	String usuario = "codi2";
    	String contrasena = "codi";
    	
    	try {
			Connection conexion = DriverManager.getConnection(url, usuario, contrasena);
			
			//SQLi 
			String sql = "SELECT id,nombre, fdn, biografia FROM users WHERE id BETWEEN ? AND ?  AND nombre = ? ORDER BY id DESC LIMIT 2 ";
			
			//Preparar / reemplazar // evitar SQL injection
			PreparedStatement pstmt = conexion.prepareStatement(sql);
			pstmt.setInt(1, 2); // SELECT id,nombre, fdn, biografia FROM users WHERE id = 1
			pstmt.setInt(2, 3);
			pstmt.setString(3, "David");

			//Prepparar statement
			
			
			//pstmt.set ([2,3,"david"]);
			
			ResultSet rs = pstmt.executeQuery();
			
			while(rs.next()) {
				int id = rs.getInt("id");
				String nombre= rs.getString("nombre");
				
				System.out.println("ID: " + id + " >>> Nombre: " + nombre);
			}
			
			//liberar conexiones y resultados .....
			rs.close();
			pstmt.close();
			conexion.close();
			
			
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block

			e.printStackTrace();
		}

    }
}
