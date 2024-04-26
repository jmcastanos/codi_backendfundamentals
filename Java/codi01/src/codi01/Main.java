package codi01;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		System.out.println("Hola!!!");
		Fecha fecha = new Fecha();
		
		System.out.println(fecha.toString());
		
		int[] intArray = { 2,5,1,30 };
		
		for(int i = 0; i < intArray.length; i++) {
			System.out.println(intArray[i]);
		}
		
		System.out.println("MATRICES !!!");
		
		int matriz[][] = {  {2,4,6,8} , {1,3,5,7}   };
		
		for(int r= 0; r < matriz.length ; r ++ ) {
			for(int c=0; c < matriz[r].length ; c++) {
				System.out.print(matriz[r][c] + " -- ");
				
			}
			System.out.println();
		}
		
	}

}