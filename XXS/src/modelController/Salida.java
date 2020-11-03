package modelController;

import java.io.Serializable;
import javax.persistence.*;
import java.sql.Timestamp;


/**
 * The persistent class for the salidas database table.
 * 
 */
@Entity
@Table(name="salidas")
@NamedQuery(name="Salida.findAll", query="SELECT s FROM Salida s")
public class Salida implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(unique=true, nullable=false)
	private int id;

	@Column(nullable=false)
	private int cantidad;

	private Timestamp fechaVenta;

	@Column(nullable=false)
	private int persona;

	@Column(nullable=false)
	private int producto;

	public Salida() {
	}

	public int getId() {
		return this.id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public int getCantidad() {
		return this.cantidad;
	}

	public void setCantidad(int cantidad) {
		this.cantidad = cantidad;
	}

	public Timestamp getFechaVenta() {
		return this.fechaVenta;
	}

	public void setFechaVenta(Timestamp fechaVenta) {
		this.fechaVenta = fechaVenta;
	}

	public int getPersona() {
		return this.persona;
	}

	public void setPersona(int persona) {
		this.persona = persona;
	}

	public int getProducto() {
		return this.producto;
	}

	public void setProducto(int producto) {
		this.producto = producto;
	}

}