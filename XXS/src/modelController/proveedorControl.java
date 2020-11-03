package modelController;

import java.io.Serializable;

import javax.annotation.Resource;
import javax.enterprise.context.SessionScoped;
import javax.inject.Named;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.transaction.UserTransaction;

@Named
@SessionScoped

public class proveedorControl implements Serializable {
	
	private static final long serialVersionUID = 1L;
	
	private Proveedor proveedor;
	
	proveedorControl(){
		proveedor = new Proveedor();
	}
	
	@PersistenceContext(unitName = "XXS")
	private EntityManager em;    

	@Resource
	private UserTransaction userTransaction;

	public Proveedor getProveedor() {
		return proveedor;
	}

	public void setProveedor(Proveedor proveedor) {
		this.proveedor = proveedor;
	}
	
	public void guardar() throws Exception  {
	    userTransaction.begin();
	    em.persist(proveedor);
	    userTransaction.commit();
	}

}