package modelController;

import java.io.Serializable;
import javax.persistence.*;
import java.sql.Timestamp;


/**
 * The persistent class for the produccion database table.
 * 
 */
@Entity
@Table(name="produccion")
@NamedQuery(name="Produccion.findAll", query="SELECT p FROM Produccion p")
public class Produccion implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(unique=true, nullable=false)
	private int idproduccion;

	@Column(nullable=false)
	private int cantidad;
	

	private Timestamp fechaCompra;

	@Column(nullable=false)
	private int material;

	@Column(nullable=false)
	private int producto;

	public Produccion() {
	}

	public int getIdproduccion() {
		return this.idproduccion;
	}

	public void setIdproduccion(int idproduccion) {
		this.idproduccion = idproduccion;
	}

	public int getCantidad() {
		return this.cantidad;
	}

	public void setCantidad(int cantidad) {
		this.cantidad = cantidad;
	}

	public Timestamp getFechaCompra() {
		return this.fechaCompra;
	}

	public void setFechaCompra(Timestamp fechaCompra) {
		this.fechaCompra = fechaCompra;
	}

	public int getMaterial() {
		return this.material;
	}

	public void setMaterial(int material) {
		this.material = material;
	}

	public int getProducto() {
		return this.producto;
	}

	public void setProducto(int producto) {
		this.producto = producto;
	}

}